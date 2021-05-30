<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Day;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!$request->has('time')){
            $date = $request->date;
            $dentist_id  = $request->dentist_id;
            $dentist = User::findOrFail($dentist_id);
            $dayWeek = Carbon::parse($date)->dayOfWeek;
            $day = Day::where('num', $dayWeek)->first();
            $times = $dentist->times()->where('day_id', $day->id)->get();
            $date_secret =Hash::make($date);
            $dentist_secret =Hash::make($dentist_id);
            
            return view('appointments.showtime',compact('times', 'date', 'dentist', 'date_secret', 'dentist_secret'));
        }else {
            if(Hash::check($request->dentist_id, $request->dentist_secret) && Hash::check($request->date, $request->date_secret)){
                $appointment = auth()->user()->appointments()->create([
                    'date'=>$request->date, 
                    'time_id'=>$request->time,
                    'dentist_id'=>$request->dentist_id
                    ]);
                    toast('You booked successfully!');
                    return redirect()->route('appointments.index');
            }else {
                abort(401);
            }
        }
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
