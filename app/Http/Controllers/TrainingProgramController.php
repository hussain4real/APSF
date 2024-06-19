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
}
