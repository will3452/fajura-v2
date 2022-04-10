<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function __construct(User $user){
        $this->user = $user;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super = $this->user->create([
            'name'=>'Administrator',
            'is_admin'=>true,
            'email'=>'super@admin.com',
            'password'=>Hash::make('password'),
        ]);

        $super->profile()->create([
            'address'=>'undefined',
            'sex'=>'undefined',
            'phone'=>'undefined',
            'birthdate'=>Carbon::parse('03/04/2000'),
            'approved_at'=>now()
        ]);
    }
}
