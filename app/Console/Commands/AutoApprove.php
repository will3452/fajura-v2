<?php

namespace App\Console\Commands;

use App\Models\Profile;
use Illuminate\Console\Command;

class AutoApprove extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:approve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'auto approve';

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
        $profiles = Profile::whereNull('approved_at')->get();
        foreach($profiles as $profile){
            $profile->approved_at = now();
            $profile->save();
        }
        return 0;
    }
}
