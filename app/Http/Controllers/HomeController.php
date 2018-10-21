<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all()->count();
        $tags=Tag::all()->count();
        $allPosts=Post::all()->count();
        $trashedPosts=Post::onlyTrashed()->get()->count();
        return view('admin.dashboard',compact(['categories','tags','allPosts','trashedPosts']));
    }
}
