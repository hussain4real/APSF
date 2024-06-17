<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Notifications\InvoicePaid;
use Illuminate\Console\Command;

class SendTransactionEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transaction:send';

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
        //get the first transaction of the user
        $users = User::query()->whereHas('transactions')->get();

        //send TransactionStarted email to the user
        foreach ($users as $user) {
            //get the first transaction of the user
            $transaction = $user->transactions->first();
            $user->notify(new InvoicePaid($transaction));
        }   

        
    }
}
