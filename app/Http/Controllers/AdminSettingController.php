<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function isAdmin(){
        if(!auth()->user()->is_admin) abort(401);
    }
    public function setting(){
        $this->isAdmin();

        return view('admin.setting');
    }

    public function AccountSave(){
        $this->isAdmin();

        $data = request()->validate([
            'password'=>'required',
            'name'=>'required'
        ]);

        //hash the password 
        $data['password'] = \Hash::make($data['password']);
        
        //save the password
        auth()->user()->password = $data['password'];
        auth()->user()->name = $data['name'];
        auth()->user()->save();

        toast('Account changes saved!', 'success');

        return back();
    }
}
