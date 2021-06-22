<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MedicalQuestion;

class MedicalAnswerController extends Controller
{

    public function giveError(){
        toast('Something is wrong', 'toast');
        return back();
    }

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = MedicalQuestion::get();
        return view('medical-history.create', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $len = count($request->q_id);
        
        if($len != count($request->answers) || $len != count($request->questions)) $this->giveError();

        //cheking for valid id
        for($i = 0; $i < $len; $i++){
            $mq = MedicalQuestion::find($request->q_id[$i]);
            if($mq){
                if($mq->question != $request->questions[$i]) $this->giveError();
            }else {
                $this->giveError();
            }
        }

        //storation
        for($i = 0; $i < $len; $i++){
            auth()->user()->medicalAnswers()->create([
                'question_id'=>$request->q_id[$i],
                'question'=>$request->questions[$i],
                'answer'=>$request->answers[$i]
            ]);
        }
        toast('Medical History Recorded');
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->with('medicalAnswers'); // lazy load 
        
        $records = $user->medicalAnswers()->get()->groupBy(function($val){
            return $val->created_at->format('Y-m-d');
        });
        return view('medical-history.show', compact('records'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
