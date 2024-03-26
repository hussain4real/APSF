<x-filament-breezy::grid-section md=2 title="Subscription" description="Subscription datails">
    <x-filament::card>
        <table class="table-auto border-separate border-spacing-2 border border-slate-400">
            <thead>
                <tr>
                    <th class="border border-slate-300">Date</th>
                    <th class="border border-slate-300">Total</th>
                    <th class="border border-slate-300">Tax</th>
                    <th class="border border-slate-300">Invoice</th>
                </tr>
            </thead>
            @foreach ($transactions as $transaction)
            <tbody>
            <tr>
                <td class="p-2 border border-slate-300"
                >{{ $transaction->billed_at->toFormattedDateString() }}</td>
                <td class="p-2 border border-slate-300">{{ $transaction->total() }}</td>
                <td class="p-2 border border-slate-300">{{ $transaction->tax() }}</td>
                <td class="p-2 border border-slate-300"><a href="{{ route('download-invoice', $transaction->id) }}"
                       target="_blank"
                       class="text-blue-400 bg-slate-700 p-2 rounded-md"
                    >
                        Download
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <!-- <x-primary-button wire:click="subscribe">Subscribe</x-primary-button> -->


        @php
//        $subscriptions = auth()->user()->subscriptions;
//        $subscription = $user->subscription();
//        $nextPayment = $subscription->nextPayment();
        $trial = auth()->user()->onTrial();
        $genericTrial = auth()->user()->onGenericTrial();
        $customer = auth()->user()->customer;
        @endphp
        <div>
{{--            <p>{{$subscribed->nextPayment()->date()}}</p>--}}
            @if ($subscriptions->count() > 0)
            <ul>
                @foreach ($subscriptions as $subscription)
                <div class="flex space-x-2 mt-4 items-center">
                    <p>Plan: {{ $subscription->type }}</p>
                    <span class="bg-green-700 rounded-md text-white px-2 py-1 shadow shadow-green-400">
                        {{ $subscription->status}}
                    </span>
                </div>
                <div class="my-2">
                    <p class="text-3xl font-semibold">Fees</p>
                    <span class="text-5xl font-extrabold tracking-tight">{{ $subscribed?->nextPayment()?->amount() }}</span>
                    <span class="ms-1 text-xl font-normal text-gray-500 dark:text-gray-400">/year</span>
                </div>
                <div class="flex justify-between items-baseline">
{{--                    <span class="text-3xl font-semibold">Next Payment:</span>--}}
{{--                    <span class="text-5xl font-extrabold tracking-tight">{{ $subscription->nextPayment()->total() }}</span>--}}
                    <div class="border border-slate-400 bg-slate-600 text-white rounded-md px-2 py-1 font-semibold">Renewal Date:
                        <span class="text-red-400">{{ $subscribed?->nextPayment()?->date()?->diffForHumans() }}
                        </span>
                    </div>
                    @if ($subscribed->active())
                    <button wire:click="pauseSubscription" class="text-blue-400 bg-slate-700 px-2 py-1 rounded-md ml-2">Pause</button>
                    <button wire:click="cancelSubscription" class="text-red-400 bg-slate-700 px-2 py-1 rounded-md ml-2">Cancel</button>
                    @endif
                    @if($subscribed->paused())
                    <button wire:click="resumeSubscription" class="text-green-400 bg-slate-700 px-2 py-1 rounded-md ml-2">Resume</button>
                    @endif
                </div>

                @endforeach

            </ul>
            @else
            {{$this->subscribeAction}}
            <x-filament-actions::modals />
            @endif
        </div>
        <div>
            @if ($genericTrial)
            <p class="text-yellow-400 my-2 ">Your trial ends at:
                <span class="text-red-400">{{ $user->trialEndsAt()->diffForHumans() }}</span>
            </p>

            @endif
        </div>

    </x-filament::card>
</x-filament-breezy::grid-section>
