<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Day::create(['name'=>'monday', 'num'=>1]);
        Day::create(['name'=>'tuesday', 'num'=>2]);
        Day::create(['name'=>'wednesday', 'num'=>3]);
        Day::create(['name'=>'thursday', 'num'=>4]);
        Day::create(['name'=>'friday', 'num'=>5]);
        Day::create(['name'=>'saturday', 'num'=>6]);
        Day::create(['name'=>'sunday', 'num'=>0]);
    }
}
