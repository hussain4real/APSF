<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pay2MController extends Controller
{
    private $merchant_id;

    private $secured_key;

    private $num;

    private $basket_id;

    private $trans_amount;

    public function __construct()
    {
        $this->merchant_id = '1003';
        $this->secured_key = 'pfYu8vPrUmYD6JZJAKhl';
        $this->num = 1;
        $this->basket_id = 'Basket Item-1';
        $this->trans_amount = $this->num;

    }

    public function create()
    {

        //        if (count($_GET) > 0) {
        //            $this->processResponse($this->merchant_id, $this->basket_id, $this->trans_amount, $_GET);
        //        }
        $token = $this->getAccessToken($this->merchant_id, $this->secured_key, $this->basket_id, $this->trans_amount);

        return view('subscribe', [
            'token' => $token,
            'merchant_id' => $this->merchant_id,
            'basket_id' => $this->basket_id,
            'trans_amount' => $this->trans_amount,
        ]);
    }

    public function getAccessToken($merchant_id, $secured_key, $basket_id, $trans_amount)
    {
        $tokenApiUrl = 'https://payments.pay2m.com/Ecommerce/api/Transaction/GetAccessToken';
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

        $this->processResponse($this->merchant_id, $this->basket_id, $this->trans_amount, $request->all());
    }

    public function processResponse($merchant_id, $original_basket_id, $txnamt, $response)
    {
        //        $client = new \GuzzleHttp\Client(['verify' => false]);
        //        $url = 'https://payments.pay2m.com/Ecommerce/api/Transaction/PostTransaction';
        //        $response = $client->request('POST', $url, [
        //            'form_params' => $response,
        //        ]);
        $trans_id = $response['transaction_id'];
        $err_code = $response['err_code'];
        $err_msg = $response['err_msg'];
        $basket_id = $response['basket_id'];
        $order_date = $response['order_date'];
        $response_key = $response['Response_Key'];
        $payment_name = $response['PaymentName'];
        $secretword = ''; // No secret code defined for merchant id 102, secret code can be entered in merchant portal.
        $response_string = sprintf('%s%s%s%s%s', $merchant_id, $original_basket_id, $secretword, $txnamt, $err_code);
        $response_hash = hash('MD5', $response_string);
        if (strtolower($response_hash) != strtolower($response_key)) {
            echo '<br/>Transaction could not be varified<br/>';

            return;
        }
    }
}
