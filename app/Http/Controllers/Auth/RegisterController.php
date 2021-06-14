<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    public function revalidatePassword($data){
        if(str_contains($data['password'], $data['lastname']) || str_contains($data['password'], $data['firstname'])  || str_contains($data['password'], $data['email'])){
            alert()->warning('','Your email or name should not included to your password.');
            // dd(1);
            return redirect(route('register'));
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        
        return Validator::make($data, [
            'lastname' => ['required', 'string', 'max:255'],
            'firstname' => ['required', 'string', 'max:255'],
            'mi' => ['required', 'string', 'max:255'],
            'birthdate' => 'required',
            'phone' => ['required'],
            'prov'=>'required',
            'city'=>'required',
            'sex'=>['required', Rule::in(['Male', 'Female'])],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@#$%^&*\(\)\-\+]).*$/'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $this->revalidatePassword($data);
        $name = $data['firstname'].' '.$data['mi'].'. '.$data['lastname'];
        $address = implode(', ', [$data['brgy'], $data['city'], $data['prov']]);
        $bdate = Carbon::parse($data['birthdate']);
        $user = User::create([
            'name' => $name,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->profile()->create([
            'sex'=>$data['sex'],
            'phone'=>$data['phone'],
            'birthdate'=>$bdate,
            'address'=>$address
        ]);
        $user->assignRole('patient');
        $user->setting()->create([]); // just to create settings
        return $user;
    }
}
