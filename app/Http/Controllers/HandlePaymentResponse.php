<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HandlePaymentResponse extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Log::info('Payment response from Pay2M: ' . json_encode($request->all()));
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/pay2m/payment_response.log'),
        ])->info('Payment response from Pay2M: ' . json_encode($request->all()));

        //extract the user id from the $transactionsBasketId

        $userId = $this->extractUserIdFromBasketId($request->basket_id);

        //create a new transaction
        $transaction = Transaction::create([
            'user_id' => $userId,
            'basket_id' => $request->basket_id,
            'transaction_id' => $request->transaction_id ?? null,
            'err_code' => $request->err_code,
            'err_msg' => $request->err_msg,
            'order_date' => $request->order_date ?? null,
            'response_key' => $request->Response_Key ?? null,
            'status' => $request->err_code == '000' || $request->err_code == '00' ? 'success' : 'failed',
        ]);
        //save the transaction
        $transaction->save();

        //return the request data
        return response()->json($request->all());
    }

    private function extractUserIdFromBasketId($basketId)
    {
        // This pattern matches the user ID which is the part before the first hyphen
        $pattern = '/^(\d+)-/';
        preg_match($pattern, $basketId, $matches);
        return $matches[1] ?? null;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
