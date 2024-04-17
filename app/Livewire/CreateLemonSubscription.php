<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use LemonSqueezy\Laravel\Checkout;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest', ['title' => 'Create Lemon Subscription'])]
class CreateLemonSubscription extends Component
{
    public string $subscriptionName;

    public int $subscriptionPrice;

    public function mount(Request $request)
    {
        $studentsSubscriptionVariantID = '342344';
        $schoolsSubscriptionVariantID = '342334';
        $membersSubscriptionVariantID = '342342';

        $subscriptionVariantID = match (true) {
            $request->user()->student !== null => $studentsSubscriptionVariantID,
            $request->user()->schools !== null => $schoolsSubscriptionVariantID,
            default => $membersSubscriptionVariantID,
        };
        $subscriptionName = match (true) {
            $request->user()->student !== null => 'Student Annual Subscription Fee',
            $request->user()->schools !== null => 'School Annual Subscription Fee',
            default => 'Member Annual Subscription Fee',
        };

        $suscriptionPrice = match (true) {
            $request->user()->student !== null => 50,
            $request->user()->schools !== null => 500,
            default => 100,
        };
        $checkout = $request->user()->subscribe($subscriptionVariantID)
            ->redirectTo(route('filament.admin.pages.my-profile'));

        //        dd($checkout);

        $this->checkout = $checkout;
        $this->subscriptionPrice = $suscriptionPrice;
        $this->subscriptionName = $subscriptionName;
    }

    public function render()
    {
        $checkout = $this->createCheckout();

        return view('livewire.create-lemon-subscription', [
            'checkout' => $this->checkout ?? null,
            'subscriptionPrice' => $this->subscriptionPrice,
            'subscriptionName' => $this->subscriptionName,
        ]);
    }

    private function createCheckout(): Checkout
    {
        // Replace this with the actual logic to create a Checkout instance
        return new Checkout('247814', '342344');
    }
}
