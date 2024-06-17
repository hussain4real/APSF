<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\SubscriptionStarted;
use Illuminate\Console\Command;

class SendSubscriptionMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //get all users with suscription
        $users = User::query()->whereHas('subscription')->get();
        
        //send SubscriptionStarted email to all users
        foreach ($users as $user) {
            $suscription = $user->subscription;
            $user->notify(new SubscriptionStarted($suscription));
        }
    }
}
