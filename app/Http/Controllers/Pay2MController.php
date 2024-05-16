<?php

namespace App\Http\Controllers;

use App\Http\Integrations\PaymentGateway\Pay2mConnector;
use App\Http\Integrations\PaymentGateway\Requests\GetAccessTokenRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
                'token' => $token,
                'merchant_id' => $this->merchant_id,
                'basket_id' => $this->basket_id,
                'trans_amount' => $this->trans_amount,
            ]);
        } catch (RequestException $exception) {
            // Handle the exception
            dd($exception->getMessage());
        }
        //        $response = $pay2m->send($tokenRequest);
        //
        //        $status = $response->status();
        //
        //        $body = $response->object();
        //
        //        $token = isset($body->ACCESS_TOKEN) ? $body->ACCESS_TOKEN : '';
        //
        //        return view('subscribe', [
        //            'token' => $token,
        //            'merchant_id' => $this->merchant_id,
        //            'basket_id' => $this->basket_id,
        //            'trans_amount' => $this->trans_amount,
        //        ]);
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
        dd($request->all());

        $this->processResponse($this->merchant_id, $this->basket_id, $this->trans_amount, $request->all());
        //TODO: redirect to a thank you page
    }

    public function processResponse($merchant_id, $original_basket_id, $txnamt, $response)
    {
        $trans_id = $response['transaction_id'];
        $err_code = $response['err_code'];
        $err_msg = $response['err_msg'];
        $basket_id = $response['basket_id'];
        $order_date = $response['order_date'];
        $response_key = json_decode($response['Response_Key']);
        $payment_name = $response['PaymentName'];
        $secretword = ''; // No secret code defined for merchant id 102, secret code can be entered in merchant portal.
        $response_string = sprintf('%s%s%s%s%s', $merchant_id, $original_basket_id, $secretword, $txnamt, $err_code);
        $response_hash = hash('MD5', $response_string);
        if (strtolower($response_hash) != strtolower($response_key)) {
            echo '<br/>Transaction could not be varified<br/>';

            return;
        }

        //TODO: save transaction to database

        //        $response = $request->all();
        //
        //        $transaction = new Transaction([
        //            'transaction_id' => $response['transaction_id'],
        //            'err_code' => $response['err_code'],
        //            'err_msg' => $response['err_msg'],
        //            'basket_id' => $response['basket_id'],
        //            'order_date' => $response['order_date'],
        //            'response_key' => $response['Response_Key'],
        //            'payment_name' => $response['PaymentName'],
        //        ]);
        //
        //        // Here, you need to get the authenticated user.
        //        $user = Auth::user();
        //
        //        $user->transactions()->save($transaction);
        //
        //TODO: creates a new subscription for the user

    }
}
