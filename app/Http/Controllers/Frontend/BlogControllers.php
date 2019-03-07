<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class BlogControllers extends Controller
{

	public function getIndex()
	{
		$posts = Post::paginate(10);
		return view('blog.blog')->withPosts($posts);
	}

    public function getSingle($slug)
    {
    	$post = Post::where('slug',$slug)->first();
    	
    	return view('blog.single')->withPost($post);
    }
}
