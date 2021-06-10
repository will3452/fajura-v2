<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AdminAppointmentController extends Controller
{
    public function isAdmin(){
        if(!auth()->user()->is_admin) abort(401);
    }

    public function all(){
        $this->isAdmin();
        $appointments = Appointment::get();
        return view('admin.appointments.all', compact('appointments'));
    }

    public function today(){
        $this->isAdmin();
        $appointments = Appointment::where('date', today()->format('Y/m/d'))->get();
        return view('admin.appointments.today', compact('appointments'));
    }

    public function incomming(){
        $this->isAdmin();
        $appointments = Appointment::where('status', 'pending')->get();
        return view('admin.appointments.incomming', compact('appointments'));
    }

    public function resolved(){
        $this->isAdmin();
        $appointments = Appointment::where('status', 'completed')->get();
        return view('admin.appointments.resolve', compact('appointments'));
    }

    public function cancelled(){
        $this->isAdmin();
        $appointments = Appointment::where('status', 'cancelled')->get();
        return view('admin.appointments.cancelled', compact('appointments'));
    }

    public function destroy($id){
        $this->isAdmin();
        $app = Appointment::findOrFail($id);
        toast('Appointment removed', 'success');
        activity()->causedBy(auth()->user())->on($app)->log('appointment removed');
        $app->delete();
        return back();
    }
}
