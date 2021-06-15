<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\DentalRecords;

class DentalRecordsController extends Controller
{

    public function checkUser(){
        if(!request()->has('user_id') ||  !(auth()->user()->hasRole('dentist') || auth()->user()->hasRole('staff'))){
            toast('Something went wrong', 'error');
            return back();
        }
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
        $this->checkUser();
        
        $user = User::findOrfail(request()->user_id);
        
        return view('dental_records.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkUser();
        // dd($request->all());

       $data =  $request->validate([
            'patient_id'=>'required',
            'date_of_initial_symptoms'=>'required',
            'symptoms'=>'required',
            'injured'=>'required',
            'dental_work_carried_out'=>'required',
            'date_of_dental_work'=>'required',
            'amount'=>'required'
        ]);

        //just parse the date
        $data['date_of_initial_symptoms'] = Carbon::parse($data['date_of_initial_symptoms']);
        $data['date_of_dental_work'] = Carbon::parse($data['date_of_dental_work']);


        if(!\Hash::check($request->patient_id, $request->patient_secret)){
            toast('Something went wrong', 'error');
            return back();
        }
        if(!$request->has('dentist_id')){
            auth()->user()->patientDentalRecords()->create($data);
        }else {
            $dentist = User::findOrFail($request->dentist_id);
            if($dentist->hasRole('dentist')){
                $dentist->patientDentalRecords()->create($data);
            }else {
                toast('Something went wrong!', 'error');
                return back();
            }
        }
        toast('Patient Dental Record Added!', 'success');
        return redirect(route('dental-records.show', $request->patient_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DentalRecords  $dentalRecords
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $user->with('dentalRecords');
        $latest = $user->dentalRecords()->latest()->first();
        return view('dental_records.show', compact('user', 'latest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DentalRecords  $dentalRecords
     * @return \Illuminate\Http\Response
     */
    public function edit(DentalRecords $dentalRecords)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DentalRecords  $dentalRecords
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DentalRecords $dentalRecords)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DentalRecords  $dentalRecords
     * @return \Illuminate\Http\Response
     */
    public function destroy(DentalRecords $dentalRecords)
    {
        //
    }
}
