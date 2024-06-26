<div class="max-w-2xl sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-xl bg-white text-gray-900">

    <!-- profile card start -->
    <div class="flex-shrink-0 m-2 relative overflow-hidden bg-primary-500 rounded-lg max-w-xs shadow-lg group">
        <svg class="absolute bottom-0 left-0 mb-8 scale-150 group-hover:scale-[1.65] transition-transform" viewBox="0 0 375 283" fill="none" style="opacity: 0.1;">
            <rect x="159.52" y="175" width="152" height="152" rx="8" transform="rotate(-45 159.52 175)" fill="white" />
            <rect y="107.48" width="152" height="152" rx="8" transform="rotate(-45 0 107.48)" fill="white" />
        </svg>
        <div class="relative pt-10 px-10 flex items-center justify-center group-hover:scale-110 transition-transform">
            <div class="block absolute w-48 h-48 bottom-0 left-0 -mb-24 ml-3" style="background: radial-gradient(black, transparent 60%); transform: rotate3d(0, 0, 1, 20deg) scale3d(1, 0.6, 1); opacity: 0.2;">
            </div>
            @unless($getRecord()->user->media && $getRecord()->user->media->count() > 0)
            <img class="relative max-w-48 max-h-48 w-48 h-48" src="https://user-images.githubusercontent.com/2805249/64069899-8bdaa180-cc97-11e9-9b19-1a9e1a254c18.png" alt="">
            @else
            <img class="relative max-w-48 max-h-48 w-48 h-48 rounded-lg bg-transparent" src="{{$getRecord()->user->profile_photo_url}}" alt="">
            @endunless
        </div>
        <div class="relative text-white px-2 pb-2 mt-6">
            <span class="block opacity-90 mb-1">verified:
                <span class="text-teal-900 opacity-100 font-bold">
                    {{-- {{$getRecord()->user->email_verified_at ? 'Yes' : 'No'}}--}}
                    {{$getRecord()->user?->email_verified_at?->diffForHumans() ?? 'Not Verified'}}
                </span>
            </span> <!-- change later -->
            <span class="block font-semibold text-xl text-wrap">{{$getRecord()->user->name}}</span>
            <div class="flex justify-between items-center mt-2">
                <span class="block text-sm font-semibold">{{$getRecord()->city}}<span class="text-xs">/{{$getRecord()->country}}</span></span>
                <span class="bg-white rounded-full text-teal-500 text-xs font-bold px-3 py-2 leading-none flex items-center">{{$getRecord()->status}}</span>
            </div>
        </div>
    </div>
    <!-- profile card end -->
</div>