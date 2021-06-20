<?php

namespace App\Http\Controllers;

use App\Models\Help;
use Illuminate\Http\Request;

class AdminHelpController extends Controller
{
    public function index(){
        $helps = Help::latest()->get();
        return view('admin.helps.index', compact('helps'));
    }

    public function create(){
        return view('admin.helps.create');
    }

    public function store(){
        $data = request()->validate([
            'title'=>'required',
            'type'=>'required',
            'body'=>'required'
        ]);

        $tutorial = Help::create($data);
        toast('tutorial created!', 'success');
        activity()->causedBy(auth()->user())->on($tutorial)->log('New tutorial Added.');
        return back();
    }

    public function edit($id){
        $help = Help::findOrFail($id);
        return view('admin.helps.edit', compact('help'));
    }

    public function destroy($id){
        $help = Help::findOrFail($id);
        toast('tutorial deleted!', 'success');
        activity()->causedBy(auth()->user())->on($help)->log('tutorial Deleted.');
        $help->delete();
        return back();
    }

    public function update($id){
        $help = Help::findOrFail($id);
        $data = request()->validate([
            'title'=>'required',
            'type'=>'required',
            'body'=>'required'
        ]);
        $help->update($data);
        toast('tutorial updated!', 'success');
        activity()->causedBy(auth()->user())->on($help)->log('tutorial updated.');
        return back();
    }
}
