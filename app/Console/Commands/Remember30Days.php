<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Mail\UserLoginReminder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
class Remember30Days extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'verify:Remember30Days';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recordar 30 dias usuario sin login';

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
        $actual_date = now();
        $endDate = $actual_date->subDay(30);
        $users = User::all();
        
        foreach ($users as $user) {
            $login_date = $user->login_at;
           
        if ($login_date <= $endDate) {

            Mail::to($user->email)->send(new UserLoginReminder());
            
        }
        
        }
        
    }
}
