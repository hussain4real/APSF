<?php

namespace App\Listeners;

use App\Events\PaymentProcessed;
use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class ProcessPayment
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
    public function handle(PaymentProcessed $event): void
    {
        //log the event
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/subscription_payment/transaction_processed.log'),

        ])->info('Payment Processed', $event->payload);
       
        //content of the log file:
        //  [2024-06-19 08:14:42] local.INFO: Payment Processed {"err_code":"901","err_msg":"Customer cancel transaction","transaction_id":null,"basket_id":"35-School-2024-06-19 08:14:24","order_date":"2024-06-19 08:14:26","Rdv_Message_Key":null,"Response_Key":"92e5dbaba3e00a27f3604611e732561a6c364a805dedfeace3b149e87368d25f"} 

        //grab the user transaction that matches the basket_id and status is not success
        $transaction = Transaction::where('basket_id', $event->payload['basket_id'])
            ->where('status', '!=', 'success')
            ->first();

        //if the transaction is not found, log the error
        if (!$transaction) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/subscription_payment/not_found.log'),

            ])->error('Transaction not found', $event->payload);
        }

        //update the transaction with the payload data

        if ($event->payload['err_code'] == '000' || $event->payload['err_code'] == '00') {
            $transaction->update([
                'transaction_id' => $event->payload['transaction_id'],
                'err_code' => $event->payload['err_code'],
                'err_msg' => $event->payload['err_msg'],
                'order_date' => $event->payload['order_date'],
                'response_key' => $event->payload['Response_Key'],
                'status' => 'success',
            ]);

            //log the transaction
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/subscription_payment/transaction_successful.log'),

            ])->info('Transaction updated', $transaction->toArray());

            Notification::send($transaction->user, new \App\Notifications\InvoicePaid($transaction));
            //create new subscription
            $subscription = $transaction->subscription()->create([
                'user_id' => $transaction->user_id,
                'type' => 'yearly',
                'status' => 'active',
                'ends_at' => now()->addYear(),
            ]);

            //generate membershipID
            $user = $transaction->user;
            $uniqueMembershipId = $user->generateUniqueMembershipId();
            $user->update(['membership_id' => $uniqueMembershipId]);

            Notification::send($user, new \App\Notifications\SubscriptionStarted($subscription));

            //log the subscription
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/subscription_payment/subscription_successful.log'),

            ])->info('Subscription created', $subscription->toArray());
        } else {
            $transaction->update([
                'transaction_id' => $event->payload['transaction_id'],
                'err_code' => $event->payload['err_code'],
                'err_msg' => $this->errorCodes($event->payload['err_code']),
                'order_date' => $event->payload['order_date'],
                'response_key' => $event->payload['Response_Key'],
                'status' => 'failed',
            ]);

            //log the transaction
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/subscription_payment/transaction_failed.log'),

            ])->info('Transaction updated', $transaction->toArray());

        
        }
    }

    private function errorCodes($errorCode)
    {
        return match ($errorCode) {
            '000' => 'Transaction successful',
            '00' => 'Transaction successful',
            '001' => 'Transaction failed',
            '901' => 'Customer cancel transaction',
            '002' => 'Time Out',
            '97' => 'Dear Customer, You have an Insufficient Balance to proceed',
            '106' => 'Dear Customer, Your transaction Limit has been exceeded please contact your bank',
            '03' => 'You have entered an Inactive Account',
            '104' => 'Entered details are Incorrect',
            '55' => 'You have entered an Invalid OTP/PIN',
            '54' => 'Card Expired',
            '13' => 'You have entered an Invalid Amount',
            '126', '308', '853' => 'Dear Customer your provided Account details are Invalid',
            '75' => 'Maximum PIN Retries has been Exceeded',
            '14', '15' => 'Dear Customer, You have entered an In-Active Card number',
            '42' => 'Dear Customer, You have entered an Invalid CNIC',
            '423' => 'Dear Customer, We are unable to process your request at the moment please try again later',
            '41' => 'Dear Customer, entered details are Mismatched',
            '801' => '{0} is your Pay2m OTP (One Time Password). Please do not share with anyone.',
            '802' => 'OTP could not be sent. Please try again later.',
            default => 'Unknown error',
        };
    }
}
