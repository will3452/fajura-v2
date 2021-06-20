<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class AdminEmailController extends Controller
{
    public function sendNow(){
        $data = request()->validate([
            'email'=>'required',
            'message'=>'required'
        ]);
        $html = $data['message'];
        $email = $data['email'];
        Mail::send([], [], function(Message $message) use ($html, $email){
            $message->to($email)
            ->subject('Fajura Admin Message')
            ->setBody($html, 'text/html');
        });
        toast('Message sent!', 'success');
        return back();
    }
}
