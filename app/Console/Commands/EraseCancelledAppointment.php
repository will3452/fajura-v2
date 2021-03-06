<?php

namespace App\Console\Commands;

use App\Models\Appointment;
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
        $appointments = Appointment::where('status', 'cancelled')->get();
        foreach($appointments as $app){
            $app->user->notify(new AppointmentCancelledWasRemoveByTheSystem($app));
            $app->delete();
        }
        return 0;
    }
}
