<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->cannot('edit schedules')) abort(401);
        return view('schedules.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->can('edit schedules')) abort(401);
        $field = $request->validate([
            'day_id'=>'required',
            'end'=>'required',
            'start'=>'required'
        ]);

        //create time slot 
        auth()->user()->times()->create($field);
        toast('Your Schedule has been created','success');
        return back()->withSuccess('Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $time = Time::findOrFail($id);
        $data = $request->validate([
            'start'=>'required',
            'end'=>'required'
        ]);

        $time->update($data);
        toast('Your schedule has been updated!', 'success');
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
        $time = Time::findOrFail($id);
        $time->delete();
        toast('Your schedule has been deleted!', 'success');
        return back();
    }
}
