<?php

namespace App\Http\Controllers;

use App\Events\TrainingProgramPurchaseProcessed;
use App\Http\Integrations\PaymentGateway\Pay2mConnector;
use App\Http\Integrations\PaymentGateway\Requests\GetAccessTokenRequest;
use App\Models\TrainingProgram;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TrainingProgramController extends Controller
{

    private $merchant_id;

    private $secured_key;

    //
    //    private $num;
    //
    private $basket_id;

    private $trans_amount;

    public function __construct()
    {
        $this->merchant_id = config('services.pay2m.merchant_id');
        $this->secured_key = config('services.pay2m.secured_key');
        //        $this->num = 1;
        // $this->basket_id = auth()->user()->id . '-' . time();
        //basket id should be the combination of the user id profile type and the current time in human readable format
        $this->basket_id = $this->basket_id;
        $this->trans_amount = $this->trans_amount;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, TrainingProgram $record)
    {
        $guestRecord = $request->query();
        //get the email array from the request query
        $guestEmails = $guestRecord['email'] ?? [];
        // dd($guestEmails);
        //extract the email from the array
        $guestEmail = $guestEmails['email'] ?? '';
        // dd($guestEmail);
        $initialPrice = auth()->user() ? $record->member_price : $record->regular_price;
        //convert price to QAR
        $covertedPrice = $this->convertCurrency($initialPrice, 'USD', 'QAR');
        $this->trans_amount = $covertedPrice;
        $this->basket_id = auth()->user() ? auth()->user()->id . '-' . $record->id . '-' . $record->title : $record->id . '-guest' . '-' . $record->title . '-' . '(' .$guestEmail . ')';
        $pay2m = new Pay2mConnector();
        $tokenRequest = new GetAccessTokenRequest(
            $this->merchant_id,
            $this->secured_key,
            $this->trans_amount,
            $this->basket_id
        );

        try {
            $response = $pay2m->send($tokenRequest);
            $status = $response->status();
            $body = $response->object();
            // dd($status, $body);
            $token = isset($body->ACCESS_TOKEN) ? $body->ACCESS_TOKEN : '';
            // dd($token);

            //create transaction with status pending
            if (Transaction::where('basket_id', $this->basket_id)->doesntExist()) {
                $transaction = new Transaction([
                    'basket_id' => $this->basket_id,
                    'amount'=> (int) $this->convertCurrency($this->trans_amount, 'QAR', 'USD'),
                    'status' => 'pending',
                ]);
                auth()->user()? auth()->user()->transactions()->save($transaction) : $transaction->save();
            }
            return view('enrolment.pay', [
                'token' => $token,
                'merchant_id' => $this->merchant_id,
                'basket_id' => $this->basket_id,
                'trans_amount'=> $this->trans_amount,
                'record' => $record,
                'guest_email' => $guestEmail,
            ]);
        } catch (\Exception $e) {
            return redirect()->route('failed-transaction')->with('error', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TrainingProgramPurchaseProcessed::dispatch($request->all());

        return redirect()->route('failed-transaction')
            ->with('success', 'Your payment was successful. You will receive an email with the details of your purchase.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingProgram $trainingProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainingProgram $trainingProgram)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrainingProgram $trainingProgram)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingProgram $trainingProgram)
    {
        //
    }

    public function failed(Request $request)
    {
        TrainingProgramPurchaseProcessed::dispatch($request->all());
        // PaymentProcessed::dispatch($request->all());
        $errorCode = $request->input('err_code');
        $errorMessage = $this->getErrorMessage($errorCode);
        // Log the error message
        // Log::error($errorMessage);

        //put error message in session
        return redirect()->route('failed-transaction')->with('error', $errorMessage);
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

    public function convertCurrency($amount, $from, $to)
    {
        $url = "https://api.exchangerate-api.com/v4/latest/$from";
        $response = file_get_contents($url);
        $result = json_decode($response, true);
        $rate = $result['rates'][$to];
        $converted_amount = $amount * $rate;
        return $converted_amount;
    }
}
