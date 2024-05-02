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

<div class="mt-6 bg-white shadow-sm rounded-lg divide-y w-full">
    @foreach ($livefeeds as $livefeed)
        <div class="p-6 flex space-x-2 " wire:key="{{ $livefeed->id }}">
            <img src="{{ $livefeed->user->profile_photo_url }}" alt="{{ $livefeed->user->name }}"
                class="w-12 h-12 rounded-full object-cover">
{{--            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"--}}
{{--                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">--}}
{{--                <path stroke-linecap="round" stroke-linejoin="round"--}}
{{--                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />--}}
{{--            </svg>--}}
            <div class="flex-1">
                <div class="flex justify-between items-center">
                    <div class="mt-2">
                        <span class="text-gray-700 font-semibold">{{ $livefeed->user->name }}</span>
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
                    <div x-data="{ expanded: false, lines: 0 }" x-init="lines = $refs.content.scrollHeight / parseFloat(getComputedStyle($refs.content)['lineHeight'])">
                        <p class="mt-4 text-lg text-gray-900 line-clamp-4" x-show="!expanded" x-ref="content">{{ $livefeed->message }}</p>
                        <p class="mt-4 text-lg text-gray-900" x-show="expanded">{{ $livefeed->message }}</p>
                        <button type="button" x-on:click="expanded = ! expanded" x-show="lines > 4">
                            <span x-show="! expanded" class="text-primary-500">Show more...</span>
                            <span x-show="expanded" class="text-orange-500">Show less...</span>
                        </button>
                    </div>
{{--                   <div x-data="{ expanded: false }">--}}
{{--                        <p class="mt-4 text-lg text-gray-900 line-clamp-4" x-show="!expanded">{{ Str::limit($livefeed->message, 100) }}</p>--}}
{{--                        <p class="mt-4 text-lg text-gray-900" x-show="expanded">{{ $livefeed->message }}</p>--}}
{{--                        @if(strlen($livefeed->message) > 100)--}}
{{--                            <button type="button" x-on:click="expanded = ! expanded">--}}
{{--                                <span x-show="! expanded" class="text-primary-500">Show more...</span>--}}
{{--                                <span x-show="expanded" class="text-orange-500">Show less...</span>--}}
{{--                            </button>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <p class="mt-4 text-lg text-gray-900 line-clamp-4 ">{{ $livefeed->message }}--}}
{{--                    </p>--}}
                    @if ($livefeed->media->isNotEmpty())
                        <div class="flex flex-wrap gap-y-3 gap-x-2 mt-4">
                            @foreach ($livefeed->media as $media)
                                @if($media->mime_type === 'video/mp4')
                                <video controls class="w-full h-[20rem] object-cover rounded-lg shadow-sm" autoplay muted>
                                    <source src="{{ $media->getUrl() }}" type="{{ $media->mime_type }}">
                                    Your browser does not support the video tag.
                                </video>
                                @else

                                    <div x-data="{ modalOpen: false, imgSrc: '' }"
                                         @keydown.escape.window="modalOpen = false"
                                         class="relative z-50 w-[18rem] h-[20rem]">
                                        <!-- Image -->
                                        <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"
                                             class="w-full h-full object-cover rounded-lg shadow-sm cursor-zoom-in"
                                             @click.stop="modalOpen = true; imgSrc = '{{ $media->getUrl() }}'">
                                        <template x-teleport="body">
                                            <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen rounded-lg" x-cloak>
                                                <div x-show="modalOpen"
                                                     x-transition:enter="ease-out duration-300"
                                                     x-transition:enter-start="opacity-0"
                                                     x-transition:enter-end="opacity-100"
                                                     x-transition:leave="ease-in duration-300"
                                                     x-transition:leave-start="opacity-100"
                                                     x-transition:leave-end="opacity-0"
                                                     @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40 rounded-lg"></div>
                                                <div x-show="modalOpen"
                                                     x-trap.inert.noscroll="modalOpen"
                                                     x-transition:enter="ease-out duration-300"
                                                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                                     x-transition:leave="ease-in duration-200"
                                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                                     class="relative w-full py-0 bg-white px-0 sm:max-w-lg sm:rounded-lg">
                                                    <div class="flex items-center justify-between">
                                                        <button @click="modalOpen=false" class="absolute -top-8 -right-10 flex items-center justify-center w-8 h-8 mt-5 mr-5 bg-orange-200 text-gray-600 rounded-full hover:text-gray-800 hover:bg-orange-400 ring-offset-0 focus:ring-offset-0 focus:ring-0 focus:outline-none ring-0 z-50">
                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
                                                        </button>
                                                    </div>
                                                    <div class="relative w-auto">
                                                        <img :src="imgSrc" alt="{{ $media->name }}" class="w-full rounded-lg">
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                    </div>



{{--                                    <div x-data="{ modalOpen: false }"--}}
{{--                                         @keydown.escape.window="modalOpen = false"--}}
{{--                                         class="relative z-50 w-auto h-auto">--}}
{{--                                        <button @click="modalOpen=true" class="inline-flex items-center justify-center h-10 px-4 py-2 text-sm font-medium transition-colors bg-white border rounded-md hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none focus:ring-2 focus:ring-neutral-200/60 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none">Open</button>--}}
{{--                                        <template x-teleport="body">--}}
{{--                                            <div x-show="modalOpen" class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen" x-cloak>--}}
{{--                                                <div x-show="modalOpen"--}}
{{--                                                     x-transition:enter="ease-out duration-300"--}}
{{--                                                     x-transition:enter-start="opacity-0"--}}
{{--                                                     x-transition:enter-end="opacity-100"--}}
{{--                                                     x-transition:leave="ease-in duration-300"--}}
{{--                                                     x-transition:leave-start="opacity-100"--}}
{{--                                                     x-transition:leave-end="opacity-0"--}}
{{--                                                     @click="modalOpen=false" class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>--}}
{{--                                                <div x-show="modalOpen"--}}
{{--                                                     x-trap.inert.noscroll="modalOpen"--}}
{{--                                                     x-transition:enter="ease-out duration-300"--}}
{{--                                                     x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"--}}
{{--                                                     x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"--}}
{{--                                                     x-transition:leave="ease-in duration-200"--}}
{{--                                                     x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"--}}
{{--                                                     x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"--}}
{{--                                                     class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">--}}
{{--                                                    <div class="flex items-center justify-between pb-2">--}}
{{--                                                        <h3 class="text-lg font-semibold">Modal Title</h3>--}}
{{--                                                        <button @click="modalOpen=false" class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">--}}
{{--                                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="relative w-auto">--}}
{{--                                                        <p>This is placeholder text. Replace it with your own content.</p>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </template>--}}
{{--                                    </div>--}}

{{--                                    <div x-data="{ isOpen: false, imgSrc: '' }">--}}
{{--                                        <!-- Image -->--}}
{{--                                        <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"--}}
{{--                                            class="w-[15rem] h-[15rem] object-cover rounded-lg shadow-sm cursor-pointer"--}}
{{--                                            x-on:click.stop="isOpen = true; imgSrc = '{{ $media->getUrl() }}'">--}}

{{--                                        <!-- Modal -->--}}
{{--                                        <div class="fixed inset-0 flex items-center justify-center z-50" x-show="isOpen"--}}
{{--                                            x-on:click.outside="isOpen = false">--}}
{{--                                            <div class="bg-white rounded-lg shadow-lg overflow-hidden max-w-2xl mx-auto">--}}
{{--                                                <img :src="imgSrc" alt="{{ $media->name }}" class="w-full">--}}
{{--                                                <button class="p-4 text-orange-400" @click="isOpen = false">Close</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                <img src="{{ $media->getUrl() }}" alt="{{ $media->name }}"--}}
{{--                                    class="w-full h-[20rem] object-cover rounded-lg shadow-sm">--}}
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>

        </div>
    @endforeach
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let videos = document.querySelectorAll('video');
        // console.log(videos);
        let options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.7
        };

        let observer = new IntersectionObserver(handleIntersect, options);

        videos.forEach(video => observer.observe(video));

        function handleIntersect(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.play();
                } else {
                    entry.target.pause();
                }
            });
        }
    });
</script>

