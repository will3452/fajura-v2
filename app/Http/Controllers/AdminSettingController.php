<?php

namespace App\Http\Controllers;

use App\Models\AppSetting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    public function isAdmin(){
        if(!auth()->user()->is_admin) abort(401);
    }
    public function setting(){
        $this->isAdmin();
        $appSetting = AppSetting::first();
        return view('admin.setting', compact('appSetting'));
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

    public function AppSave(){
        $this->isAdmin();

        $data = request()->validate([
            'brand_name'=>'required',
            'brand_saying'=>'required',
            'map_url'=>'',
            'fb_page_url'=>'',
            'messenger_url'=>''
        ]);

        AppSetting::first()->update($data);

        toast('Application changes saved!', 'success');

        return back();
    }
}
