<?php

namespace App\Console;

use App\Console\Commands\AutoApprove;
use App\Console\Commands\TestingCommand;
use App\Console\Commands\GenerateSitemap;
use App\Console\Commands\MakeAdminSetting;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\NotifyTodaysAppointment;
use App\Console\Commands\EraseCancelledAppointment;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        NotifyTodaysAppointment::class,
        MakeAdminSetting::class,
        GenerateSitemap::class,
        AutoApprove::class,
        EraseCancelledAppointment::class
        // TestingCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command(NotifyTodaysAppointment::class)->dailyAt('05:00')->timezone('Asia/Manila');
        $schedule->command(GenerateSitemap::class)->daily();
        $schedule->command(AutoApprove::class)->everyMinute();
        $schedule->command(EraseCancelledAppointment::class)->weekly();
        // $schedule->command(NotifyTodaysAppointment::class)->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
