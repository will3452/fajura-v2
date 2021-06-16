<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Notifications\CompletedAppointment;
use App\Notifications\CancelledBookedAppointment;

class DentistAppointmentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }


    public function check(){
        if(!auth()->user()->hasRole('dentist')) abort(401);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->check();
        return view('appointments.dentist-index');

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
        //
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
        if(!auth()->user()->hasRole('dentist') && !auth()->user()->hasRole('staff')){
            toast('Something went error', 'error');
            return back();
        }
        $appointment = auth()->user()->meetings()->findOrFail($id);
        $request->validate([
            'a'=>'required'
        ]);
        
        if($request->a == 'a'){
            $appointment->update(['status'=>'completed']);
            toast('Appointment marked as Completed', 'success');

            //notify dentist
            $appointment->dentist->notify(new CompletedAppointment($appointment, "You marked as completed the appointment (ID ".$appointment->unique_id.").", route('dentist-appointments.index')));

            $appointment->user->notify(new CompletedAppointment($appointment, "dentist marked as completed the Appointment (ID ".$appointment->unique_id.").", route('appointments.index')));
        }else {
            $appointment->update(['status'=>'cancelled']);

            //notify
            $appointment->dentist->notify(new CancelledBookedAppointment($appointment, "You cancelled the appointment (ID ".$appointment->unique_id.").", route('dentist-appointments.index')));

            $appointment->user->notify(new CancelledBookedAppointment($appointment, "dentist cancelled Appointment (ID ".$appointment->unique_id.").", route('appointments.index')));
            toast('Appointment cancelled', 'success');
        }
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
        //
    }
}
