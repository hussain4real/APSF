<?php

namespace App\Listeners;

use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Laravel\Paddle\Events\WebhookReceived;

class PaddleEventListener
{
    /**
     * Create the events listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the events.
     */
    public function handle(WebhookReceived $event): void
    {

        //        if (! isset($events->payload['event_type'])) {
        //            Log::error('alert_name not found in payload', ['data' => $events->payload]);
        //
        //            return;
        //        } else {
        //            Log::info('alert_name found in payload', ['data' => $events->payload]);
        //        }
        if ($event->payload['event_type'] === 'customer.updated') {
            Log::info('Customer updated events received', ['data' => $event->payload]);
            Notification::make('customer-updated')
                ->success()
                ->color('success')
                ->title('Subscription Created')
                ->body('Your subscription has been created. You will be billed on the next billing cycle.')
                ->send();
        }
        if ($event->payload['event_type'] === 'subscription.created') {
            Log::info('Subscription created events received', ['data' => $event->payload]);
            Session::flash('subscribed', 'Your transaction has been completed. Thank you for your purchase.');
        }
        if ($event->payload['event_type'] === 'transaction.completed') {
            //create a session

            Log::info('Transaction completed events received', ['data' => $event->payload]);
            //            Notification::make('transaction-completed')
            //                ->success()
            //                ->color('success')
            //                ->title('Transaction Completed')
            //                ->body('Your transaction has been completed. Thank you for your purchase.')
            //                ->send();
            //            Notification::make('transaction-completed')
            //                ->success()
            //                ->color('success')
            //                ->title('Transaction Completed')
            //                ->body('Your transaction has been completed. Thank you for your purchase.')
            //                ->sendToDatabase(auth()->user());
        }
    }
}
