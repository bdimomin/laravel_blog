<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public function index(){
        $settings= Setting::first();
        $categories = Category::take(5)->get();
        $first_post = Post::orderBy('created_at','desc')->first();
        $second_post=Post::orderBy('created_at','desc')->skip(1)->take(2)->get();
        $python_post=Category::find(3);
        $laravel_post=Category::find(2);
        $wordpress_post=Category::find(4);
        return view('frontEnd.index',compact(['settings','categories','first_post','second_post','python_post','laravel_post','wordpress_post']));
    }
    public function singlePost($slug){
        $tags=Tag::all();
        $post=Post::where('slug',$slug)->first();
        $settings= Setting::first();
        $categories = Category::take(5)->get();
        $prev_post=Post::where('id','<',$post->id)->max('id');
        $next_post=Post::where('id','>',$post->id)->min('id');
        $prev_post=Post::find($prev_post);
        $next_post=Post::find($next_post);

        return view('frontEnd.single',compact(['tags','settings','categories','post','prev_post','next_post']));
    }

    public function allCategory($id){
        $tags=Tag::all();
        $categories = Category::take(5)->get();
        $category=Category::find($id);
        $settings= Setting::first();
        return view('frontEnd.category',compact(['categories','category','settings','tags']));
    }
    public function allTags($id){
        $tags=Tag::all();
        $categories = Category::take(5)->get();
        $settings= Setting::first();
        $tag=Tag::find($id);
        return view('frontEnd.tag',compact(['categories','tag','settings','tags']));
    }

}
