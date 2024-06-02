<?php

namespace App\Listeners;

use App\Notifications\MemberWelcome;
use Illuminate\Auth\Events\Verified;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        $event->user->notify(new MemberWelcome());
    }
}
