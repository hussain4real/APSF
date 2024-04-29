<?php

namespace App\Http\Controllers;

use App\Models\PayPal;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as ExpressCheckout;

class PayPalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws \Throwable
     */
    public function create()
    {
        return view('payment.create');

        //        dd($response);

    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        $provider = new ExpressCheckout();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            'intent' => 'CAPTURE',
            'application_context' => [
                'return_url' => route('payment.success'),
                'cancel_url' => route('payment.cancel'),
            ],
            'purchase_units' => [
                0 => [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => '1000.00',
                    ],
                ],
            ],
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('create-transactions')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create-transactions')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new ExpressCheckout();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('create-transactions')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('create-transactions')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('create-transactions')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

    public function process()
    {
        $provider = new ExpressCheckout;
        $provider->getAccessToken();

        dd($provider->listProducts());

        $response = $provider->addProduct('Demo Product', 'Demo Product', 'SERVICE', 'SOFTWARE')
            ->addAnnualPlan('Demo Plan', 'Demo plan description', 1000)
            ->setReturnAndCancelUrl(route('payment.success'), route('payment.cancel'))
            ->setupSubscription('Aminu Hussain', 'aminuhussain22@gmail.com', '2024-05-12');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PayPal $payPal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayPal $payPal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PayPal $payPal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayPal $payPal)
    {
        //
    }
}
