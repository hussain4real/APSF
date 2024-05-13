<?php

namespace App\Http\Controllers;

class Pay2MController extends Controller
{
    private $merchant_id;

    private $secured_key;

    private $num;

    private $basket_id;

    private $transaction_amount;

    public function __construct()
    {
        $this->merchant_id = '1010';
        $this->secured_key = 'MjmFgnErr_2QtwlhjOhE';
    }

    public function index()
    {

    }
}
