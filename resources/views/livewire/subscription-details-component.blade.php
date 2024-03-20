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
        <x-primary-button wire:click="subscribe">Subscribe</x-primary-button>
    


        <form wire:submit.prevent="submit" class="space-y-6">

            {{ $this->form }}

            <div class="text-right">
                <x-filament::button type="submit" form="submit" class="align-right">
                    Submit!
                </x-filament::button>
            </div>
        </form>
    </x-filament::card>
</x-filament-breezy::grid-section>