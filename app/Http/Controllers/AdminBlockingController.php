<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class AdminBlockingController extends Controller
{
    public function blockedList(){
        $users = User::where('is_admin', false)->get();
        return view('admin.blocked.list',  compact('users'));
    }
}
