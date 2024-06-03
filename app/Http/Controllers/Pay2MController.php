<?php

namespace App\Http\Controllers;

use App\Http\Integrations\PaymentGateway\Pay2mConnector;
use App\Http\Integrations\PaymentGateway\Requests\GetAccessTokenRequest;
use App\Models\Membership;
use App\Models\Subscription;
use App\Models\Transaction;
use App\Notifications\InvoicePaid;
use App\Notifications\SubscriptionStarted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Response;

class Pay2MController extends Controller
{
    private $merchant_id;

    private $secured_key;

    //
    //    private $num;
    //
    private $basket_id;

    private $trans_amount;

    private $plan_name;

    private $plan_price;

    //
    public function __construct()
    {
        $this->merchant_id = config('services.pay2m.merchant_id');
        $this->secured_key = config('services.pay2m.secured_key');
        //        $this->num = 1;
        $this->basket_id = 'Basket Item-1';
        $this->trans_amount = 1;
        //
    }

    public function create()
    {
        $userProfileType = Auth::user()->profile_type_for_membership;

        // Get all memberships
        $memberships = Membership::all();

        //        dd($memberships);
        $membershipData = [];
        foreach ($memberships as $membership) {

            //            dd($userProfileType);
            //            dd($membership->name);
            // Check if the membership name matches the user's profile type
            if ($membership->name === $userProfileType) {
                $membershipData[] = [
                    'id' => $membership->id,
                    'name' => $membership->name,
                    'slug' => $membership->slug,
                    'price' => $membership->price,
                    'currency' => $membership->currency,
                    'duration' => $membership->duration,
                    'price_note' => $membership->price_note,
                    'benefits' => $membership->benefits,
                ];
            }
        }

        //        dd($membershipData);
        $pay2m = new Pay2mConnector();
        $tokenRequest = new GetAccessTokenRequest(
            $this->merchant_id,
            $this->secured_key,
            1,
            'Basket Item-1'
        );
        try {
            $response = $pay2m->send($tokenRequest);
            $status = $response->status();
            $body = $response->object();
            //            dd($body);
            $token = isset($body->ACCESS_TOKEN) ? $body->ACCESS_TOKEN : '';

            return view('subscribe', [
                'userProfileType' => $userProfileType,
                'membershipData' => $membershipData,
                'token' => $token,
                'merchant_id' => $this->merchant_id,
                'basket_id' => $this->basket_id,
                'trans_amount' => $this->trans_amount,
            ]);
        } catch (RequestException $exception) {
            // Handle the exception
            dd($exception->getMessage());
        }
    }

    public function getAccessToken($merchant_id, $secured_key, $basket_id, $trans_amount)
    {
        $tokenApiUrl = 'https://payments.pay2m.com/Ecommerce/api/Transaction/GetAccessToken';
        //        $tokenApiUrl = 'https://payments.pay2m.com:8443/api/token';
        //use guzzle
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->request('POST', $tokenApiUrl, [
            'form_params' => [
                'MERCHANT_ID' => $merchant_id,
                'SECURED_KEY' => $secured_key,
                'TXNAMT' => $trans_amount,
                'BASKET_ID' => $basket_id,
            ],
        ]);
        //        dd($response->getBody());
        $payload = json_decode($response->getBody());
        //        dd($payload);
        $token = isset($payload->ACCESS_TOKEN) ? $payload->ACCESS_TOKEN : '';

        //        dd($token);

        return $token;
    }

    public function handleResponse(Request $request)
    {
        //        dd($request->all());
        //        $err_code = $request->err_code;
        //        $err_msg = $request->err_msg;
        //        $trans_id = $request->transaction_id;
        //        $basket_id = $request->basket_id;
        //        $order_date = $request->order_date;
        //        $rdv_message_key = $request->Rdv_Message_Key;
        //        $response_key = $request->Response_Key;
        //        $payment_name = $request->PaymentName;
        //        $secretword = ''; // No secret code defined for merchant id 102, secret code can be entered in merchant portal.
        //        $response_string = sprintf('%s%s%s%s%s', $this->merchant_id, $this->basket_id, $secretword, $this

        $this->processResponse($this->merchant_id, $this->basket_id, $this->trans_amount, $request->all());

    }

    public function processResponse($merchant_id, $original_basket_id, $txnamt, $response)
    {
        //        dd($response);
        $trans_id = $response['transaction_id'];
        $err_code = $response['err_code'];
        $err_msg = $response['err_msg'];
        $basket_id = $response['basket_id'];
        $order_date = $response['order_date'];
        $response_key = $response['Response_Key'];
        //        $payment_name = $response['PaymentName'];
        $secretword = ''; // No secret code defined for merchant id 102, secret code can be entered in merchant portal.
        $response_string = sprintf('%s%s%s%s%s', $merchant_id, $original_basket_id, $secretword, $txnamt, $err_code);
        $generated_hash = hash('sha256', $response_string);
        //        dd([
        //            'response Key' => $response_key,
        //            'generated Hash' => $generated_hash,
        //        ]);
        if (strtolower($generated_hash) !== strtolower($response_key)) {
            echo '<br/>Transaction could not be verified<br/>';

            return;
        } else {
            //            dd('Transaction verified');
            if ($err_code == '000' || $err_code == '00') {
                echo '<strong>Transaction Successfully Completed. Transaction ID: '.$trans_id.'</strong><br/>';
                echo '<br/>Date: '.$order_date;
                //TODO: save transaction to database

                $transaction = new Transaction([
                    'transaction_id' => $trans_id,
                    'err_code' => $err_code,
                    'err_msg' => $err_msg,
                    'basket_id' => $basket_id,
                    'order_date' => $order_date,
                    'response_key' => $response_key,
                    'amount' => $txnamt,
                    'status' => 'success',
                ]);
                $user = Auth::user();
                $user->transactions()->save($transaction);
                //send email notification
                Notification::send($user, new InvoicePaid($transaction));
                //TODO: creates a new subscription for the user
                $subscription = new Subscription([
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'status' => 'active',
                    'type' => 'yearly',
                    'trial_ends_at' => now()->addDays(7),
                    'ends_at' => now()->addYear(),
                ]);
                $user->subscription()->save($subscription);
                //send email notification
                Notification::send($user, new SubscriptionStarted($subscription));

                //return to profile route with success message
                return redirect()->route('filament.admin.auth.profile')->with('success', 'Transaction completed successfully');
            } else {
                Log::info('Transaction Failed. Message: '.$err_msg);

                return redirect()->route('subscribe')->with('error', 'Transaction Failed. Message: '.$err_msg);
                //                echo '<br/>Transaction Failed. Message: '.$err_msg;
            }

        }

    }

    public function checkout(Request $request)
    {
        // Get the data sent by the payment gateway
        $data = $request->all();

        // Log the data for debugging purposes
        Log::info('Received checkout data:', $data);

        dd($data);
    }
}
