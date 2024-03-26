<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
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
     */
    public function create(Request $request)
    {

        $subscriptionType = 'student_annual_subscription_fee';
        $studentSubscriptionPriceID = 'pri_01hsb68jw5jmjbms2xbmr5ba9s';
        $teacherSubscriptionPriceID = 'pri_01hsb68jw5jmjbms2xbhfdsges';
        $schoolSubscriptionPriceID = 'pri_01hsb68jw5jmj9872s2xbhfdsges';
        $founderSubscriptionPriceID = 'pri_01hs233fmj9872s2xbhfdsges';
        $contractorSubscriptionPriceID = 'pri_01hsb68jw920jn23hfdsges';
        $trainingProviderSubscriptionPriceID = 'pri_01hsb68jw5jm2gd34es';
        $educationalConsultantSubscriptionPriceID = 'pri_01hsb68jw5jmj9872fe332ges';
        $memberSubscriptionPriceID = 'pri_01hsx4ytr4w9msrm8y666rkb2x';

        $subscriptionName = match (true) {
            $request->user()->student !== null => 'Student Annual Subscription Fee',
            $request->user()->teacher !== null => 'Teacher Annual Subscription Fee',
            $request->user()->school !== null => 'School Annual Subscription Fee',
            $request->user()->founder !== null => 'Founder Annual Subscription Fee',
            $request->user()->contractor !== null => 'Contractor Annual Subscription Fee',
            $request->user()->trainingProvider !== null => 'Training Provider Annual Subscription Fee',
            $request->user()->educationalConsultant !== null => 'Educational Consultant Annual Subscription Fee',
            default => 'Member Annual Subscription Fee',
        };

        $subscriptionPriceID = match (true) {
            $request->user()->student !== null => $studentSubscriptionPriceID,
            $request->user()->teacher !== null => $teacherSubscriptionPriceID,
            $request->user()->school !== null => $schoolSubscriptionPriceID,
            $request->user()->founder !== null => $founderSubscriptionPriceID,
            $request->user()->contractor !== null => $contractorSubscriptionPriceID,
            $request->user()->trainingProvider !== null => $trainingProviderSubscriptionPriceID,
            $request->user()->educationalConsultant !== null => $educationalConsultantSubscriptionPriceID,
            default => $memberSubscriptionPriceID,
        };
        $subscriptionPrice = auth()->user()->previewPrices([$subscriptionPriceID]);
        $checkout = $request->user()->subscribe($subscriptionPriceID)
            ->returnTo(route('filament.admin.pages.my-profile'));

        return view('subscribe', [
            'checkout' => $checkout,
            'subscriptionName' => $subscriptionName,
            'subscriptionPrice' => $subscriptionPrice,
        ]);
    }

    public function updatePaymentMethod(Request $request)
    {
        $user = $request->user();

        return $user->subscription()->redirectToUpdatePaymentMethod();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //after the user has subscribed, you can redirect them to a page
        return redirect()->route('filament.admin.pages.my-profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
