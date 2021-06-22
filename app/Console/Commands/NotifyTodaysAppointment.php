<?php

namespace App\Console\Commands;

use App\Mail\YouHaveAnAppointmentToday;
use App\Models\Appointment;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyTodaysAppointment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:today';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify user todays appointment';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todayApp = Appointment::where([
            ['date', '=', today()->format('Y/m/d')],
            ['status','=','pending']
            ])->get();
        
        foreach($todayApp as $app){
            Mail::to($app->user)->send(new YouHaveAnAppointmentToday($app->user));
        }
        echo 'proccessed!';
        
        return 0;
    }
}
