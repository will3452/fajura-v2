<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\DentalRecords;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // dd(auth()->user()->profile);
        if (auth()->user()->profile->is_blocked) {
            auth()->logout();
            alert()->info('', 'You\'ve been blocked, Contact us to resolve the issue.');
            return redirect(route('login'));
        } elseif (auth()->user()->profile->approved_at != null) {
            if (auth()->user()->is_admin) {
                $patients = User::role('patient')->get();
                $appointments = Appointment::where('status', 'pending')->get();
                $annual = DentalRecords::whereYear('created_at', today()->format('Y'))->sum('amount');
                $monthly = DentalRecords::whereYear('created_at', today()->format('Y'))->whereMonth('created_at', today()->format('m'))->sum('amount');

                //get all data for charting
                $data = DentalRecords::whereYear('created_at', request()->year ?? today()->format('Y'))->get()->groupBy(function ($val) {
                    return $val->created_at->format('M');
                });
                // return $data;
                return view('admin.dashboard', compact('patients', 'appointments', 'annual', 'monthly', 'data'));
            } else {
                // dd(auth()->user()->medicalAnswers()->count());
                // if(auth()->user()->hasRole('patient') && !(auth()->user()->medicalAnswers()->count())){
                //    return redirect(route('medical-history.create').'?first=true');
                // }
                return view('dashboard');
            }
        } else {
            auth()->logout();
            alert()->info('', 'Your Profile is under review');
            return redirect(route('login'));
        }
    }
}
