<?php

namespace App\Listeners;

use App\Events\TrainingProgramPurchaseProcessed;
use App\Models\Transaction;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

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
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/training_program_enrollment/transaction_processed.log'),

        ])->info('Payment Processed', $event->payload);



        //grab the user transaction that matches the basket_id and status is not success
        $transaction = Transaction::where('basket_id', $event->payload['basket_id'])
            ->where('status', '!=', 'success')
            ->first();

        $guestEmail = $this->extractEmailFromBasketId($transaction->basket_id);
        //if the transaction is not found, log the error
        if (!$transaction) {
            Log::build([
                'driver' => 'single',
                'path' => storage_path('logs/training_program_enrollment/not_found.log'),

            ])->error('Transaction not found', $event->payload);
            
        }

        //update the transaction with the payload data for successful transaction

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
                'path' => storage_path('logs/training_program_enrollment/success.log'),

            ])->info('Transaction updated', [
                'transaction' => $transaction->toArray(),
                'guestEmail' => $guestEmail,

            ]);


            if (!$transaction->user) {
                Notification::route('mail', $guestEmail)->notify(new \App\Notifications\InvoicePaid($transaction));
            } else {
                Notification::send($transaction->user, new \App\Notifications\InvoicePaid($transaction));

                $trainingProgramTitle = $this->extractTitleFromBasketId($transaction->basket_id);
                $trainingPrograms = $transaction->user->trainingPrograms()->where('title', $trainingProgramTitle)
                    ->where('status', 'pending')->first();
                //update the status of the trainingPrograms to enrolled
                $trainingPrograms->update([
                    'status' => 'enrolled',
                ]);
                //send Notification to the user


            }
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
                'path' => storage_path('logs/training_program_enrollment/failed.log'),

            ])->info('Transction updated', [
                'transaction' => $transaction->toArray(),
                'guestEmail' => $guestEmail,
            ]);
        }
    }

    private function extractEmailFromBasketId($basketId)
    {
        $pattern = '/\(([^)]+)\)$/';
        preg_match($pattern, $basketId, $matches);
        return $matches[1] ?? null;
    }

    private function extractTitleFromBasketId($basketId)
    {
        $pattern = '/^\d+-\d+-(.+)$/';
        preg_match($pattern, $basketId, $matches);
        return $matches[1] ?? null;
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
