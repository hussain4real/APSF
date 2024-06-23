<?php

namespace App\Http\Controllers;

use App\Models\TrainingProgram;
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
        $this->basket_id = auth()->user()->id . '-' . auth()->user()->profile_type;
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
    public function create()
    {
        //
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

}
