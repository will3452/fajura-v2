<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\UserInformation;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;

class AdminAccountManagementController extends Controller
{

    public function isAdmin(){
        if(!auth()->user()->is_admin) abort(401);
    }
    public function __construct(){
    }
// list of new accounts
    public function listOfNewAccounts(){
        $this->isAdmin();
        $users = User::role('patient')->whereHas('profile', function(Builder $q){
            return $q->whereNull('approved_at');
        })->get();
        return view('admin.accounts.new-accounts', compact('users'));
    }

    public function updateListOfNewAccounts($id){
        $this->isAdmin();
        $user = User::findOrFail($id);
        request()->validate([
            'q'=>'required'
        ]);

        if(!in_array(request()->q, ['a','d'])){
            toast('Operation failed!', 'error');
            return back();
        }

        if(request()->q == 'd'){
            $user->delete();
            toast('User Declined and Deleted', 'success');
            return back();
        }

        $user->profile->update(['approved_at'=>now()]);
        toast('User Approved!', 'success');
        return back();
    }
// end of list new accounts

// patient accounts
    public function patientAccounts(){
        $this->isAdmin();
        $users = User::role('patient')->whereHas('profile', function(Builder $q){
            return $q->whereNotNull('approved_at');
        })->get();

        return view('admin.accounts.patient-accounts', compact('users'));
    }

    public function patientAccountsShow($id){
        $this->isAdmin();
        $user = User::findOrFail($id);
        $user->with('profile');
        return view('admin.accounts.show', compact('user'));

    }

    public function patientAccountUpdate($id){
        $this->isAdmin();
        $user = User::findOrFail($id);

        request()->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'birthdate'=>'required',
            'phone'=>'required',
            'job'=>'',
            'availability'=>'',
            'sex'=>'required'
        ]);

        $user->update([
            'name'=>request()->name, 
            'email'=>request()->email, 
        ]);

        $user->profile()->update([
            'address'=>request()->address, 
            'birthdate'=>\Carbon\Carbon::parse(request()->birthdate),
            'phone'=>request()->phone,
            'sex'=>request()->sex,
            'job'=>request()->job,
            'availability'=>request()->availability
        ]);
        toast('User information updated!', 'success');
        return back();
    }
// end of patient accounts

//staff accounts
    public function staffAccounts(){
        $this->isAdmin();
        $users = User::role('staff')->whereHas('profile', function(Builder $q){
            return $q->whereNotNull('approved_at');
        })->get();

        return view('admin.accounts.staff-accounts', compact('users'));
    }
//end of staff accounts
// dentist accounts 
    public function dentistAccounts(){
        $this->isAdmin();
        $users = User::role('dentist')->get();
        return view('admin.accounts.dentist-accounts', compact('users'));
    }
// end of dentist accounts


    public function create(){
        $this->isAdmin();
        $roles = Role::all();
        $password = Str::random(12);
        return view('admin.accounts.create', compact('roles', 'password'));
    }

    public function store(Request $request){
        $this->isAdmin();
        $this->validate($request, [
            'role'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required',
            'birthdate'=>'required',
            'address'=>'required',
            'phone'=>'required',
            'sex'=>'required',
            'job'=>'',
            'availability'=>''
        ]);

        $user = User::create([
            'email'=>$request->email, 
            'password'=>\Hash::make($request->password),
            'name'=>$request->name
        ]);
        $birthdate = explode('-', $request->birthdate);
        $birthdate = implode('/', $birthdate);
        $user->profile()->create([
            'address'=>request()->address, 
            'birthdate'=>\Carbon\Carbon::parse($birthdate),
            'phone'=>request()->phone,
            'sex'=>request()->sex,
            'job'=>request()->job,
            'availability'=>request()->availability,
            'approved_at'=>now()
        ]);

        $user->assignRole($request->role);
        toast('User created!', 'success');
        Mail::to($user)->send(new UserInformation($request->password));
        return back();

    }


}
