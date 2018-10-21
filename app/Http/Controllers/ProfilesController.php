<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile=Auth::user();
        return view('admin.profile.index',compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $user->profile->delete();
        $user->delete();
        return redirect()->route('Users');
    }

    public function profileUpdate( Request $request){

        $profiles = Auth::user();

        $this->validate($request,[
           'password'=>'required'
        ]);

        if ($request->hasFile('avatar')){
            $avatar = $request->avatar;
            $avatar_new_name=time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatar',$avatar_new_name);
            $profiles->profile['avatar']='uploads/avatar/'.$avatar_new_name;
            $profiles->profile->save();
        }

        $profiles->name=$request->username;
        $profiles->email=$request->email;
        $profiles->profile['bio']=$request->bio;
        $profiles->profile['facebook']=$request->facebook;
        $profiles->profile['youtube']=$request->youtube;
        $profiles->save();
        $profiles->profile->save();

        if ($request->has('password')){
            $profiles->password=bcrypt($request->password);
            $profiles->save();
            $request->session()->flush();
        }
        return redirect()->route('dashboard');
    }
}
