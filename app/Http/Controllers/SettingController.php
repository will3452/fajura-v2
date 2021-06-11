<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(){
        return $this->middleware(['auth']);
    }

    public function setting(){
        return view('setting');
    }
}
