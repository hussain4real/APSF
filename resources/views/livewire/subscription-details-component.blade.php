<x-filament-breezy::grid-section md=2 title="Subscription" description="Subscription datails">
    <x-filament::card>
        <table>
            @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->billed_at->toFormattedDateString() }}</td>
                <td>{{ $transaction->total() }}</td>
                <td>{{ $transaction->tax() }}</td>
                <td><a href="{{ route('download-invoice', $transaction->id) }}" target="_blank">Download</a></td>
            </tr>
            @endforeach
        </table>
        <!-- <x-primary-button wire:click="subscribe">Subscribe</x-primary-button> -->


        @php
        $subscriptions = auth()->user()->subscriptions;
        $subscribed = auth()->user()->subscribed();
        $trial = auth()->user()->onTrial();
        @endphp
        <div>
            @if ($subscribed)
            <ul>
                @foreach ($subscriptions as $subscription)


                <h2 class="text-yellow-400">Plan: {{ $subscription->id}}</h2>
                <li>Plan: {{ $subscription->type }}</li>
                @if ($trial)
                <small class="border border-amber-400 bg-amber-400 text-white rounded-md px-2 py-1 font-semibold">Trial Ends: 
                    <span class="text-red-400">{{ $subscription->trial_ends_at->toFormattedDateString() }}
                    </span>
                    </small>
                @else
                <small class="border border-green-400 bg-green-400 text-white rounded-md px-2 py-1 font-semibold">Renewal Date: 
                    <span class="text-red-400">{{ $subscription->ends_at->toFormattedDateString() }}
                    </span>
                    </small>
                @endif
                <button wire:click="pauseSubscription" class="text-blue-400 bg-slate-700 px-2 py-1 rounded-md ml-2">Pause</button>

                @endforeach

            </ul>
            @else
            {{$this->subscribeAction}}
            <x-filament-actions::modals />
            @endif
        </div>

    </x-filament::card>
</x-filament-breezy::grid-section>