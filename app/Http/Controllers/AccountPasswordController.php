<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PasswordChanged;
use Illuminate\Support\Facades\Mail;

class AccountPasswordController extends Controller
{
    public function showPasswordForm(){
        return view('change-password');
    }

    public function storePassword(){
        request()->validate([
            'old_password'=>'required',
            'password' => ['required', 'string', 'confirmed']
        ]);

        if(!(\Hash::check(request()->old_password, auth()->user()->password))){
            toast('Your old password is wrong!', 'error');
            return back();
        }

        $newPassword = \Hash::make(request()->password);
        
        auth()->user()->password = $newPassword;
        auth()->user()->save();

        Mail::to(auth()->user())->send(new PasswordChanged(request()->password));
        toast('Your password has been changed!', 'success');
        return back();
    }
}
