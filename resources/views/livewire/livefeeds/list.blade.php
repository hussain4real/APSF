<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;


new
 #[Layout('layouts.app')]
 class extends Component {
    public \Illuminate\Database\Eloquent\Collection $livefeeds;

    public ?\App\Models\Livefeed $editing = null;

    public function mount(): void
    {
        $this->getLivefeeds();
    }

    #[\Livewire\Attributes\On('livefeed-created')]
    public function getLivefeeds(): void
    {
        $this->livefeeds = \App\Models\Livefeed::with(['user', 'media'])
            ->latest()
            ->get();
    }

    public function edit(\App\Models\Livefeed $livefeed): void
    {
        $this->editing = $livefeed;

        $this->getLivefeeds();
    }

    #[\Livewire\Attributes\On('livefeed-edit-canceled')]
    #[\Livewire\Attributes\On('livefeed-updated')]
    public function disableEditing(): void
    {
        $this->editing = null;
        $this->getLivefeeds();
    }

    public function delete(\App\Models\Livefeed $livefeed): void
    {
        $this->authorize('delete', $livefeed);
        $livefeed->delete();

        $this->getLivefeeds();
    }
}; ?>

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
    @foreach ($livefeeds as $livefeed)
        <div class="p-6 flex space-x-2 " wire:key="{{ $livefeed->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
            </svg>
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-gray-800">{{ $livefeed->user->name }}</span>
                        <small
                            class="ml-2 text-sm text-gray-600">{{ $livefeed->created_at->format('j M Y, g:i a') }}</small>
                        @unless ($livefeed->created_at->eq($livefeed->updated_at))
                            <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                        @endunless
                    </div>
                    @if ($livefeed->user->is(auth()->user()))
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link wire:click="edit({{ $livefeed->id }})">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                                <x-dropdown-link wire:click="delete({{ $livefeed->id }})"
                                    wire:confirm="Are you sure to delete this chirp?">
                                    {{ __('Delete') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    @endif
                </div>

                @if ($livefeed->is($editing))
                    <livewire:livefeeds.edit :livefeed="$livefeed" :key="$livefeed->id" />
                @else
                    <p class="mt-4 text-lg text-gray-900 line-clamp-4 ">{{ $livefeed->message }}</p>
                    @if ($livefeed->media->isNotEmpty())
                        <div class="flex flex-wrap gap-2 mt-4">
                            @foreach ($livefeed->media as $media)
                                <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"
                                    class="w-[15rem] h-lg object-cover rounded-lg shadow-sm">
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>

        </div>
    @endforeach
</div>
