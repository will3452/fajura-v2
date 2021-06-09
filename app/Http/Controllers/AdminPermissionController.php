<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    public function isAdmin(){
        if(!auth()->user()->is_admin) abort(401);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->isAdmin();
        return view('admin.permissions');
    }
}
