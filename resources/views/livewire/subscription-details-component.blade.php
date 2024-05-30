<x-filament-breezy::grid-section 2xl=2 title="Subscription" description="Subscription datails">
    <x-filament::card>
        <div class="mb-6">
            {{$this->subscriptionInfolist}}
        </div>
        <div>
            {{$this->table}}
        </div>


        <!-- <x-primary-button wire:click="subscribe">Subscribe</x-primary-button> -->


        @php
//        $subscriptions = auth()->user()->subscriptions;
//        $subscription = $user->subscription();
//        $nextPayment = $subscription->nextPayment();
        $trial = auth()->user()->onTrial();

        @endphp
        <div>
{{--            <p>{{$subscribed->nextPayment()->date()}}</p>--}}
            @if ($subscriptions->count() > 0)
            <ul>
{{--                @dd($priceInQAR)--}}
                @foreach ($subscriptions as $subscription)
{{--                    @dd($subscription)--}}

                <div class="flex justify-between items-baseline">
{{--                    <span class="text-3xl font-semibold">Next Payment:</span>--}}
{{--                    <span class="text-5xl font-extrabold tracking-tight">{{ $subscription->nextPayment()->total() }}</span>--}}

{{--                    <a href="{{$user->customerPortalUrl()}}" class="text-slate-200 bg-teal-700 px-2 py-1 rounded-md ml-2">View More</a>--}}
{{--                    @if ($subscribed->active())--}}
{{--                    <button wire:click="pauseSubscription" class="text-blue-400 bg-slate-700 px-2 py-1 rounded-md ml-2">Pause</button>--}}
{{--                    <button wire:click="cancelSubscription" class="text-red-400 bg-slate-700 px-2 py-1 rounded-md ml-2">Cancel</button>--}}
{{--                    @endif--}}
{{--                    @if($subscribed->paused())--}}
{{--                    <button wire:click="resumeSubscription" class="text-green-400 bg-slate-700 px-2 py-1 rounded-md ml-2">Resume</button>--}}
{{--                    @endif--}}
                </div>

                @endforeach

            </ul>
            @else
{{--            {{$this->subscribeAction}}--}}
{{--            <x-filament-actions::modals />--}}
                <a href="{{route('subscribe')}}" >
                    <x-filament::button class="my-4 ">Subscribe</x-filament::button>
                </a>
            @endif
        </div>
        <div>
            @if ($trial)
            <p class="text-yellow-400 my-2 ">Your trial ends at:
                <span class="text-red-400">{{ $user->trialEndsAt()->diffForHumans() }}</span>
            </p>

            @endif
        </div>

    </x-filament::card>
</x-filament-breezy::grid-section>
