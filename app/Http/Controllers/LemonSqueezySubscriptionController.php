<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class LemonSqueezySubscriptionController extends Controller
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
        $studentsSubscriptionVariantID = '342344';
        $schoolsSubscriptionVariantID = '342334';
        $membersSubscriptionVariantID = '342342';
        $subscriptionVariantID = match (true) {
            $request->user()->student !== null => $studentsSubscriptionVariantID,
            $request->user()->schools()->count() > 0 => $schoolsSubscriptionVariantID,
            $request->user()->member !== null => $membersSubscriptionVariantID,
            default => $membersSubscriptionVariantID,
        };
        $subscriptionName = match (true) {
            $request->user()->student !== null => 'Student Annual Subscription Fee',
            $request->user()->schools()->count() > 0 => 'School Annual Subscription Fee',
            $request->user()->member !== null => 'Member Annual Subscription Fee',
            default => 'Member Annual Subscription Fee',
        };

        $suscriptionPrice = match (true) {
            $request->user()->student !== null => 50,
            $request->user()->schools()->count() > 0 => 500,
            $request->user()->member !== null => 100,
            default => 100,
        };

        //        dd($suscriptionPrice, $subscriptionName, $subscriptionVariantID);
        $cacheKey = 'lemon_squeezy_'.$subscriptionVariantID;

        if (Cache::has($cacheKey)) {
            $checkout = Cache::get($cacheKey);
        } else {
            $checkout = $request->user()->subscribe($subscriptionVariantID)
                ->expiresAt(now()->addMinutes(10))
                ->redirectTo(route('filament.admin.pages.my-profile'));

            // Cache the checkout for 60 minutes
            Cache::put($cacheKey, $checkout, 60);
        }
        //        dd($checkout);

        return view('lemon-subscribe', [
            'checkout' => $checkout,
            'subscriptionPrice' => $suscriptionPrice,
            'subscriptionName' => $subscriptionName,
        ]);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
