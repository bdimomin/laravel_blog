<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::orderBy('created_at','desc')->get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $tags=Tag::all();

        if($categories->count()==0){
            session()->flash('success','Please create category first');
            return redirect()->back();
        }else{
            return view('admin.posts.create',compact(['categories','tags']));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
           'title'=>'required',
           'description'=>'required',
           'featured_image'=>'required|image',
           'category'=>'required',
           'tags'=>'required'
        ]);

        $featured_image=$request->file('featured_image');
        $featured_image_name=time().$featured_image->getClientOriginalName();
        $path='uploads/posts/';
        $featured_image->move($path,$featured_image_name);
        $featured_imageURL=$path.$featured_image_name;

        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->description,
            'category_id'=>$request->category,
            'featured'=>$featured_imageURL,
            'slug'=>str_slug($request->title),
            'user_id'=>Auth::user()->id
        ]);

        $post->tags()->attach($request->tags);
        session()->flash('success','Post create successfully');
        return redirect()->route('AllPosts');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $tags=Tag::all();
        $post = Post::find($id);
        return view('admin.posts.edit',compact(['post','categories','tags']));
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

        $post= Post::find($id);

        if($request->hasFile('featured_image')){
            $featured = $request->featured_image;
            $featured_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_name);
            $post->featured='uploads/posts/'.$featured_name;
        }
        $post->title=$request->title;
        $post->slug=str_slug($request->title);
        $post->content=$request->description;
        $post->category_id=$request->categorySelect;
        $post->save();
        $post->tags()->sync($request->tags);
        session()->flash('success','Post updated successfully');
        return redirect()->route('AllPosts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete=Post::find($id);
        $delete->delete();
        session()->flash('success','Post removed to trash');
        return redirect()->back();
    }

    public function deletedPosts(){
        $deletedPosts=Post::onlyTrashed()->get();
        return view('admin.posts.trashed',compact('deletedPosts'));
    }
    public function restorePost($id){
        $trashedPost=Post::withTrashed()->where('id',$id)->first();
        $trashedPost->restore();
        session()->flash('success','Post restored successfully');
        return redirect(route('AllPosts'));

    }

    public function killPost($id){
        $trashedPost=Post::withTrashed()->where('id',$id)->first();
        $trashedPost->forceDelete();
        session()->flash('success','Post permanently removed');
        return redirect()->back();
    }
}
