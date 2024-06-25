<x-home-layout>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <div class="mt-32 mx-auto container" id="container">
        <div>
            <h1 class="text-5xl font-semibold text-center">Live Feeds</h1>
        </div>
        <div>

            @livewire('livefeeds.list')
        </div>
    </div>
</x-home-layout>
<style>
    .container {
        padding: 0 5rem;
    }

    /*mobile */
    @media (max-width: 640px) {
        .container {
            padding: 0 0.5rem;
        }
    }
</style>