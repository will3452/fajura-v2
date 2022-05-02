<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    public function viewChat()
    {
        $messages = ChatMessage::whereUserId(auth()->id())->orWhere('to_id', auth()->id())->limit(10)->get();
        return view('chat-messages', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);


        ChatMessage::create([
            'user_id' => auth()->id(),
            'to_id' => optional(User::role('staff')->first())->id ?? 1,
            'content' => $request->get('content'),
        ]);

        return back();
    }
}
