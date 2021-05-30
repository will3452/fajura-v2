<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(auth()->user()->profile);
        if(auth()->user()->profile->approved_at != null){
            return auth()->user()->is_admin ? view('admin-dashboard'):view('dashboard');
        }else {
            auth()->logout();
            alert()->info('','Your Profile is under review');
            return redirect(route('login'));
        }
    }
}
