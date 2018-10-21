<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('created_at','desc')->get();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'name'=>'required',
            'email'=>'required'
        ]);

       $user = User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt(123456)
       ]);

       $profile=Profile::create([
           'user_id'=>$user->id,
           'avatar'=>'uploads/avatar/avatar.png'
       ]);
        session()->flash('success','Users Created Successfully');
        return redirect()->route('Users');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function makeAdmin($id){
        $user= User::find($id);
        $user->admin=1;
        $user->save();
        session()->flash('success','User Successfully updated to Admin');
        return redirect()->route('Users');
    }
    public function removeAdmin($id){
        $user= User::find($id);
        $user->admin=0;
        $user->save();
        session()->flash('success','User is removed from admin');
        return redirect()->route('Users');
    }
}
