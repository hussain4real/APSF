<?php

namespace App\Listeners;

use App\Events\TrainingProgramPurchaseProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProcessTrainingProgramPayment
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
    public function handle(TrainingProgramPurchaseProcessed $event): void
    {
        Log::info('Training Program Purchase Processed', $event->payload);
    }
}
