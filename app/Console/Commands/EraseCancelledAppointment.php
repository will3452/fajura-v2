<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\AppointmentCancelledWasRemoveByTheSystem;

class EraseCancelledAppointment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'erase:cancelled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Erase all cancelled appointment.';

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
        $appointments = Appointment::get();
        foreach($appointments as $app){
            echo $app->created_at;
        }
        return 0;
    }
}
