<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tooth;
use Illuminate\Http\Request;

class DentalRecordsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $request->validate([
            'treatments'=>'required',
            'cost'=>'required'
        ]);

        foreach($request->teeth as $toothId){
            auth()->user()->patientDentalRecords()->create([
                'tooth_id'=>$toothId,
                'user_id'=>$request->user_id,
                'treatments'=>$request->treatments,
                'cost'=>$request->cost
            ]);
        }

        toast('success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $lower = Tooth::LOWER();
        $upper = Tooth::UPPER();
        return view('dental_records.show', compact('user', 'lower', 'upper'));
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
