<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Mail\AppointmentUpdate;
use Illuminate\Support\Facades\Mail;

class AllAppointmentController extends Controller
{
    public function checkUser(){
        if(!auth()->user()->can('browse appointments')){
            abort(401);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        $this->checkUser();

        $appointments = [];

        if(request()->has('get')){
            $get = request()->get;
            if($get == 'today'){
                $appointments = Appointment::where('date', today()->format('Y/m/d'))->get();
            }else if($get == 'tomorrow'){
                $appointments = Appointment::where('date', today()->addDay()->format('Y/m/d'))->get();
            }else if($get == 'incoming'){
                $appointments = Appointment::where('status', 'pending')->get();
            }else if($get == 'completed'){
                $appointments = Appointment::where('status', 'completed')->get();
            }else if($get == 'cancelled'){
                $appointments = Appointment::where('status', 'cancelled')->get();
            }else{
                toast('Something is wrong!', 'error');
                return redirect()->route('all-appointments.index');
            }
        }else {
            $appointments = Appointment::latest()->get();
        }
        return view('all-appointments.index', compact('appointments'));
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
        $this->checkUser();
        $app = Appointment::findOrFail($id);

        $request->validate([
            'a'=>'required'
        ]);

        if(!in_array($request->a, ['a', 'c'])){
            toast('Something is wrong', 'error');
            return back();
        }else {
            $a = $request->a;

            if($a == 'a'){
                $app->update(['status'=>'completed']);
            }else if($a == 'c'){
                $app->update(['status'=>'cancelled']);
            }
        }
        //send email if user enabled the notify by email in setting
        if($app->user->setting->notify_by_email){
            Mail::to($app->user)->send(new AppointmentUpdate($a == 'a' ? 'completed': 'cancelled'));
        }
        toast('Appointmet updated!', 'sucess');
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
