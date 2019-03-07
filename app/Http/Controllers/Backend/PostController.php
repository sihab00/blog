<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Cetegory;
use Session;
use Purifier;
use Image;
use Storage;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =Post::paginate(5);
       return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Cetegory::all();
        $tags = Tag::all();
       return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
       $this->validate($request, array(
        'title'=>'required',
        'slug'=>'required|alpha_dash|min:5|max:191|unique:posts,slug',
        'category_id'=>'required',
        'body'=>'required',
        'image'=>'required|image'
       
        ));
       //store the data
       $post = new Post();

       $post->title = $request->title;
       $post->slug = $request->slug;
       $post->category_id = $request->category_id;
       $post->body =Purifier::clean($request->body);
        if ($request->hasfile('image')) {
           $image = $request->file('image');
           $fileName = time().'.'.$image->getClientOriginalExtension();
           $location = public_path('image/'.$fileName);
           Image::make($image)->resize(400,400)->save($location);

           $post->image = $fileName;
        }

       $post->save();
       $post->tags()->sync($request->tags,false);
       Session::flash('success','The blog post was successfully save!');
       // return redirect()->back();
       return redirect()->route('posts.show', $post->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);
        return view('posts.show')->withPost($post);

    } 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post::find($id);
         $tags= Tag::all();
         $categories=Cetegory::all();
         $cate = array();
         foreach ($categories as $category) {
            $cate[$category->id]=$category->name;
         }
         $tags2 = array();
         foreach ($tags as $tag) {
            $tags2[$tag->id]=$tag->name;
         }
        return view('posts.edit')->withPost($post)->withCategories($cate)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post =Post::find($id);

            $this->validate($request, array(
            'title'=>'required',
            'slug'=>'required|alpha_dash|min:5|max:191|unique:posts,slug,$id',
            'category_id'=>'required|integer',
            'body'=>'required'
            ));
        $post = Post::find($id);

        $post->title=$request->input('title');
        $post->slug=$request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->body=Purifier::clean($request->input('body'));

        if ($request->hasfile('image')) {
           $image = $request->file('image');
           $fileName = time().'.'.$image->getClientOriginalExtension();
           $location = public_path('image/'.$fileName);
           Image::make($image)->resize(400,400)->save($location);
           $oldName = $post->image;

           $post->image = $fileName;

           Storage::delete($oldName);
        }

        $post->save();

         $post->tags()->sync($request->tags);

        Session::flash('success','The blog post was successfully updated!');
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $post= Post::find($id);
       $post->tags()->detach();
       $oldName= $post->image;

       Storage::delete($oldName);
       $post->delete();
       


       Session::flash('success','The blog wass delete succesfully!');
       return redirect()->route('posts.index');
    }
}
