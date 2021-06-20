<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Console\Command;

class MakeAdminSetting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:adminsetting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a setting for admin';

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
        $user = User::where('email', 'admin@fajura.site')->first()->setting()->create([]);
        if($user){
            echo 'Admin Setting created';
        }
        return 0;
    }
}
