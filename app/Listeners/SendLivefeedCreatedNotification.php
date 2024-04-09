<?php

namespace App\Listeners;

use App\Events\LivefeedCreated;
use App\Models\User;
use App\Notifications\NewLivefeed;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendLivefeedCreatedNotification implements ShouldQueue
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
    public function handle(LivefeedCreated $event): void
    {
        foreach (User::whereNot('id', $event->livefeed->user_id)->cursor() as $user) {
            $user->notify(new NewLivefeed($event->livefeed));
        }
    }
}
