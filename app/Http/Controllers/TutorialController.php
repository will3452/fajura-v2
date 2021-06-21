<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class TutorialController extends Controller
{
    public function index(){
        if(request()->has('q')){
            $helps = Help::where('title', 'LIKE', '%'.request()->q.'%')->paginate(10);
        }else {
            $helps = Help::latest()->paginate(10);
        }
        return view('helps.index', compact('helps'));
    }

    public function show($id){
        $help = Help::findOrFail($id);
        return view('helps.show', compact('help'));
    }
}
