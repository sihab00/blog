<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class FrontEndControllers extends Controller
{
    public function getAbout()
   {
   	return view('about');
   }
   public function getHome()
   {
    $posts = Post::select('id','title','body','slug')->orderBY('created_at','desc')->get();
   	return view('home')->withPosts($posts);
   }
    public function getContact()
   {
   	return view('contact');
   }

}
