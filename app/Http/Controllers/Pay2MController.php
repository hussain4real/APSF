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
        // $this->basket_id = auth()->user()->id . '-' . time();
        //basket id should be the combination of the user id profile type and the current time in human readable format
        $this->basket_id = auth()->user()->id . '-' . auth()->user()->profile_type . '-' . now()->format('Y-m-d H:i:s');
        $this->trans_amount = $this->trans_amount ?? 1;
        // $this->trans_amount = 10;
        //
    }

    public function create()
    {

        if (Auth::user()->hasActiveSubscription()) {
            return redirect()->route('filament.admin.pages.my-profile')->with('error', __('You already have an active subscription'));
        }

        if(auth()->user()->trainingProvider || auth()->user()->educationalConsultant || auth()->user()->contractor){
            return redirect()->route('failed')->with('info', __('Please contact sales for your subscription'));
        }

        $userProfileType = Auth::user()?->profile_type_for_membership ?? null;

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

        //    dd($membershipData);
        //convert the membershipData price  from USD to QAR  using the current exchange rate
        if (empty($membershipData)) {
            return redirect()->route('failed')->with('error', __('No membership found for your profile type'));
        }
        $membershipData[0]['price'] = $this->convertCurrency($membershipData[0]['price'], 'USD', 'QAR');
        // dd($membershipData[0]['price']);
        //convert to integer
        $membershipData[0]['price'] = (int) $membershipData[0]['price'];

        $this->trans_amount = $membershipData[0]['price'];

        // dd($this->trans_amount);
        $pay2m = new Pay2mConnector();
        $tokenRequest = new GetAccessTokenRequest(
            $this->merchant_id,
            $this->secured_key,
            $this->trans_amount,

            $this->basket_id
            // 'Basket Item-1'
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

    public function convertCurrency($amount, $from, $to)
    {
        $url = 'https://api.exchangerate-api.com/v4/latest/' . $from;
        $response = file_get_contents($url);
        $result = json_decode($response, true);
        $rate = $result['rates'][$to];
        $convertedAmount = $amount * $rate;

        return $convertedAmount;
    }

    public function handleResponse(Request $request)
    {

        $this->processResponse($this->merchant_id, $this->basket_id, $this->trans_amount, $request->all());
    }

    public function processResponse($merchant_id, $original_basket_id, $txnamt, $response)
    {
        //    dd($response);
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
            return redirect()->route('filament.admin.pages.my-profile')->with('success', __('Transaction completed successfully'));
       
    }

    public function getAccessTokenForRecurringTransaction($merchant_id, $secured_key)
    {
        $tokenApiUrl = 'https://merchant.pay2m.com:8443/api/token';
        //        $tokenApiUrl = 'https://payments.pay2m.com:8443/api/token';
        //use guzzle
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->request('POST', $tokenApiUrl, [
            'form_params' => [
                'MERCHANT_ID' => $merchant_id,
                'SECURED_KEY' => $secured_key,

            ],
        ]);
        //        dd($response->getBody());
        $payload = json_decode($response->getBody());
        //        dd($payload);
        $token = isset($payload->ACCESS_TOKEN) ? $payload->ACCESS_TOKEN : '';

        //        dd($token);

        return $token;
    }

    public function getInstrumentToken($token, $trans_id)
    {
        $client = new \GuzzleHttp\Client();
        $tokenApiUrl = 'https://merchant.pay2m.com:8443/api/user/instruments';

        // Append the transaction_id as a query parameter
        $response = $client->request('GET', $tokenApiUrl, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
            'query' => [
                'transaction_id' => $trans_id,
            ]
        ]);

        // Assuming you want to return the response body
        return $response->getBody()->getContents();
    }

    public function checkout(Request $request)
    {
        // Get the data sent by the payment gateway
        $data = $request->all();

        // Log the data for debugging purposes
        Log::info('Received checkout data:', $data);

        dd($data);
    }

    public function failed(Request $request)
    {
        // dd($request->all());
        //put error message in session
        return redirect()->route('failed')->with('error', __('Transaction Failed, please try again'));
    }
}
