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
        $subscriptionName = 'Student Annual subscription fee';
        $subscriptionType = 'student_annual_subscription_fee';
        $subscriptionPriceID = 'pri_01hsb68jw5jmjbms2xbmr5ba9s';
        $subscriptionPrice = auth()->user()->previewPrices([$subscriptionPriceID]);
        $checkout = $request->user()->subscribe($subscriptionPriceID, $subscriptionType)
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
