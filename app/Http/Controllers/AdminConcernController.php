<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminConcernController extends Controller
{
    public function listOfConcerns(){
        $concerns = Message::get();
        return view('admin.concerns.list', compact('concerns'));
    }

    public function markAsSolved($id){
        $concern = Message::findOrFail($id);
        $concern->update(['is_resolved'=>true]);
        toast('Concern '.$concern->unique_id.' marked as Solved!');
        return back();
    }
}
