<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalQuestion;

class AdminMedicalQuestionController extends Controller
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
        $questions = MedicalQuestion::get();
        return view('admin.mq.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isAdmin();
        return view('admin.mq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isAdmin();
        $data = $request->validate([
            'type'=>'required',
            'question'=>'required',
            'answers'=>''
        ]);

        $mq = MedicalQuestion::create($data);
        toast('Question created', 'success');
        activity()->causedBy(auth()->user())->on($mq)->log('medical question created');
        return back();
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mq = MedicalQuestion::findOrFail($id);
        activity()->causedBy(auth()->user())->on($mq)->log('medical question removed');
        $mq->delete();
        toast('Question was removed', 'success');
        return back();
    }
}
