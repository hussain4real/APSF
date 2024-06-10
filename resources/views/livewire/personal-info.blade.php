<x-filament-breezy::grid-section 2xl=2 title="Personal Information" description="Manage your personal information.">
    @if (session()->has('error'))
        
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-2 rounded ">
            {{ session('error') }}
        </div> 
        
    @endif
    @if (session()->has('success'))
        
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 my-2 rounded ">
            {{ session('success') }}
        </div>
        
    @endif
    <x-filament::card>
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