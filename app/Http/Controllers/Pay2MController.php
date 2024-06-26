<?php

namespace App\Http\Controllers;

use App\Events\PaymentProcessed;
use App\Http\Integrations\PaymentGateway\Pay2mConnector;
use App\Http\Integrations\PaymentGateway\Requests\GetAccessTokenRequest;
use App\Models\Membership;
use App\Models\PaymentPlan;
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
        $this->basket_id = auth()->user()->id . '-' . auth()->user()->profile_type;
        $this->trans_amount = $this->trans_amount;
        // $this->trans_amount = 10;
        //
    }

    //refactored create method start

    //refactored create method end

    public function create()
    {

        if (Auth::user()->hasActiveSubscription()) {
            return redirect()->route('filament.admin.pages.my-profile')->with('error', __('You already have an active subscription'));
        }

        // if (auth()->user()->trainingProvider || auth()->user()->educationalConsultant || auth()->user()->contractor) {

        //     if (auth()->user()->paymentPlans()->where('status', 'pending')->exists()) {
        //         $userProfileType = Auth::user()->profile_type_for_membership ?? null;

        //         // Get all memberships
        //         $memberships = Membership::get(['name', 'benefits']);
        //         // dd($memberships);
        //         $membershipData = [];
        //         foreach ($memberships as $membership) {
        //             // Check if the membership name matches the user's profile type
        //             if ($membership->name === $userProfileType) {
        //                 $membershipData[] = [
        //                     'name' => $membership->name,
        //                     'benefits' => $membership->benefits,
        //                 ];
        //             }
        //         }
        //         // dd($membershipData);
        //         $paymentPlan = PaymentPlan::where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        //         // dd($paymentPlan);
        //         $paymentPrice = $paymentPlan->second_currency_amount;
        //         // dd($paymentPrice);

        //         $pay2m = new Pay2mConnector();
        //         $tokenRequest = new GetAccessTokenRequest(
        //             $this->merchant_id,
        //             $this->secured_key,
        //             $paymentPrice,
        //             $this->basket_id
        //         );

        //         // dd($tokenRequest);

        //         try {
        //             $response = $pay2m->send($tokenRequest);
        //             $status = $response->status();
        //             $body = $response->object();
        //             //            dd($body);
        //             $token = isset($body->ACCESS_TOKEN) ? $body->ACCESS_TOKEN : '';

        //             return view('service_provider.subscribe', [
        //                 'userProfileType' => $userProfileType,
        //                 'membershipData' => $membershipData,
        //                 'token' => $token,
        //                 'merchant_id' => $this->merchant_id,
        //                 'basket_id' => $this->basket_id,
        //                 'trans_amount' => $paymentPrice,
        //             ]);
        //         } catch (RequestException $exception) {
        //             // Handle the exception
        //             dd($exception->getMessage());
        //         }
        //     } elseif (auth()->user()->paymentPlans()->where('status', 'paid')->exists()) {
        //         return redirect()->route('filament.admin.pages.my-profile')->with('error', __('You already have an active subscription'));
        //     }

        //     return redirect()->route('failed')->with('info', __('Please contact sales for your subscription'));
        // }

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
            // $this->trans_amount=1,

            $this->basket_id
            // 'Basket Item-1'
        );
        // dd($tokenRequest);
        try {
            $response = $pay2m->send($tokenRequest);
            $status = $response->status();
            $body = $response->object();
            //            dd($body);
            $token = isset($body->ACCESS_TOKEN) ? $body->ACCESS_TOKEN : '';

            //if transaction exist with success status, redirect to profile page
            // if (Transaction::where('basket_id', $this->basket_id)->where('status', 'success')->exists()) {
            //     return redirect()->route('filament.admin.pages.my-profile')->with('success', __('Transaction completed successfully'));
            // }
            //create transaction with status of pending
            if (Transaction::where('basket_id', $this->basket_id)->doesntExist()) {
                $transaction = new Transaction([
                    'basket_id' => $this->basket_id,
                    'amount' => (int) $this->convertCurrency($this->trans_amount, 'QAR', 'USD'),
                    'status' => 'pending',
                ]);
                Auth::user()->transactions()->save($transaction);
            }


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
        Log::info('Received payment response from checkout:', $request->all());


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

        //convert the amount to USD
        $txnamt = $this->convertCurrency($txnamt, 'QAR', 'USD');

        $transactionId = $response['transaction_id'];

        // Check if transaction already exists
        if (Transaction::where('transaction_id', $transactionId)->exists()) {
            // Handle duplicate transaction (e.g., show a message or redirect)
            return redirect()->route('filament.admin.pages.my-profile')->with('success', __('Transaction completed successfully'));
        }
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

        $uniqueMembershipId = $user->generateUniqueMembershipId();
        $user->membership_id = $uniqueMembershipId;
        $user->save();

        //return to profile route with success message
        // return redirect()->route('filament.admin.pages.my-profile')->with('success', __('Transaction completed successfully'));
    }


    public function success(Request $request)
    {
        PaymentProcessed::dispatch($request->all());

        return redirect()->route('failed')->with('success', __('Transaction completed successfully'));
    }

    public function failed(Request $request)
    {
        PaymentProcessed::dispatch($request->all());
        $errorCode = $request->input('err_code');
        $errorMessage = $this->getErrorMessage($errorCode);
        // Log the error message
        // Log::error($errorMessage);

        //put error message in session
        return redirect()->route('failed')->with('error', $errorMessage);
    }

    public function getErrorMessage($errorCode)
    {
        return match ($errorCode) {
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
            '901' => 'We noticed that you cancelled the transaction. Please try again',
                // Add other codes as needed
            default => 'Unable to process your request at the moment. Please try again later',
        };
    }

  
}
