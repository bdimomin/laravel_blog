<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $settings=Setting::all();
        return view('admin.settings.index',compact('settings'));
    }
    public function update(Request $request, $id){
       $settings = Setting::find($id);
       $settings->site_title=$request->site_title;
       $settings->site_about=$request->site_about;
       $settings->contact_number=$request->contact_number;
       $settings->email_address=$request->email_address;
       $settings->address=$request->address;
       $settings->save();
       session()->flash('success','Settings updated successfully');
       return redirect()->route('dashboard');
    }
}
