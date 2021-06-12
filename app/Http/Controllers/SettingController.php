<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth']);
    }

    public function setting(){
        session()->put('darkmode', auth()->user()->setting->dark_mode);
        return view('setting');
    }
}
