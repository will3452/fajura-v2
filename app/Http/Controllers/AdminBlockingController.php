<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class AdminBlockingController extends Controller
{
    public function blockedList(){
        $profiles = Profile::get();
        return view('admin.blocked.list',  compact('profiles'));
    }
}
