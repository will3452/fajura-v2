<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Day;
use App\Models\Time;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Notifications\YouBookAnAppointment;
use App\Notifications\YouHaveANewAppointment;
use App\Notifications\CancelledBookedAppointment;

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
        $user = User::find($request->patient_id);
        $patient_id = $request->patient_id;
        $date = $request->date;
            $dentist_id  = $request->dentist_id;
            $dentist = User::findOrFail($dentist_id);
            $dayWeek = Carbon::parse($date)->dayOfWeek;
            $day = Day::where('num', $dayWeek)->first();
            $timesx = $dentist->times()->where('day_id', $day->id)->get();
            $times = collect([]);
            foreach($timesx as $t){
                if($t->appointments()->where('date', $date)->count() == 0 || ($t->appointments()->where('status', 'cancelled')->count() != 0  && $t->appointments()->where('status', 'pending')->count() == 0)){
                    $times->push($t);
                }
            }

        if(!$request->has('time')){
            $date_secret =Hash::make($date);
            $dentist_secret =Hash::make($dentist_id);

            return view('appointments.showtime',compact('times', 'date', 'dentist', 'date_secret', 'dentist_secret', 'day', 'patient_id', 'user'));
        }else {
            if(!$times->where('id', $request->time)->count()) {
                $date_secret =Hash::make($date);
                $dentist_secret =Hash::make($dentist_id);
                toast('This slot is not available', 'error');
                return view('appointments.showtime',compact('times', 'date', 'dentist', 'date_secret', 'dentist_secret', 'day'));
            }
            if(Hash::check($request->dentist_id, $request->dentist_secret) && Hash::check($request->date, $request->date_secret)){
                $time = Time::find($request->time);
                $appointment = $user->appointments()->create([
                    'date'=>$request->date,
                    'time_id'=>$request->time,
                    'end_time'=>$time->end,
                    'start_time'=>$time->start,
                    'dentist_id'=>$request->dentist_id
                    ]);

                    //notify her/him that she/he successfully booked
                    $user->notify(new YouBookAnAppointment($appointment));

                    //dentist notify
                    $appointment->dentist->notify(new YouHaveANewAppointment($appointment));

                    toast('You booked successfully!');
                    return redirect('/all-appointments');
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
        $appointment = auth()->user()->appointments()->findOrFail($id);

        //check if cancellable
        if(!$appointment->is_cancellable){
            toast('You cancelled this booked appointment', 'success');
            return back();
        }

        $appointment->status = 'cancelled';
        $appointment->save();

        //notify patient
        auth()->user()->notify(new CancelledBookedAppointment($appointment, "You cancelled the appointment (ID ".$appointment->unique_id.").", route('appointments.index')));

        $appointment->dentist->notify(new CancelledBookedAppointment($appointment, "Patient cancelled Appointment (ID ".$appointment->unique_id.").", route('dentist-appointments.index')));

        toast('You\'ve successfully cancelled!', 'success');
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
