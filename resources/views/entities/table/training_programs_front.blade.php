@php use App\TrainingStatus; @endphp
{{--sample cards for courses--}}

<style>
    .fi-ta-record {
        /* display: none; */
        background-color: rgba(3, 55, 49, 0.8) !important;
        transition: all 0.5s ease-in-out;
    }
    .justify-start{
        justify-content: center !important;
    }

    .ps-4, .pe-4, .py-4, .p-y-3{
        /* display: none; */
        padding-top: 0 !important;
        padding-bottom: 0.5rem !important;
        padding-inline-start: 0 !important;
        padding-inline-end: 0 !important;
        
    }

    .gap-y-3{
        row-gap: 0 !important;
    }

    .fi-ta-record:hover {
        /*add some animation and effect*/
        background-color: rgba(228, 97, 46, 0.8) !important;
        transition: all 0.5s ease-in-out;

    }

    .fi-modal-window {
        margin-top: 5rem;
    }

    .fi-in-entry-wrp-label .text-sm {
        font-size: 1.2rem !important;

    }
</style>
<div class="max-w-full bg-white dark:bg-slate-700 rounded-lg text-gray-900 dark:text-gray-200 overflow-hidden ">
    <a href="{{route('training-programs.show', $getRecord()->id)}}">

        @if($getRecord()->media->count() > 0)
        <img class="w-full max-h-full h-[15rem]" src="{{$getRecord()->media[0]->getUrl()}}" alt="Sunset in the mountains">
        @else
        <img class="w-full max-h-full h-[13rem]" src="https://images.unsplash.com/photo-1505455184862-554165e5f6ba?q=80&w=2938&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Sunset in the mountains">
        @endif
        {{-- @dd($getRecord())--}}
        <div class="px-2 py-4 text-center">
            <div class="font-bold text-xl mb-2">{{$getRecord()->title}}</div>
            <div class="flex items-center justify-around gap-1 text-gray-600 dark:text-gray-400 mb-1">
                <p class="font-semibold text-gray-500 dark:text-gray-300">
                    {{$getRecord()->instructor_name}}
                </p>
                <small class="flex justify-center items-center gap-1">
                    <span style="width: 14px;">
                        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="50" cy="50" r="50" fill="#9ca1a8" />
                            <line x1="50" y1="55" x2="50" y2="10" stroke="white" stroke-width="10" />
                            <line x1="55" y1="50" x2="80" y2="50" stroke="white" stroke-width="10" />
                        </svg>
                    </span>
                    {{$getRecord()->duration}}
                </small>
            </div>

            <p class="text-justify px-2 leading-tight tracking-tight text-gray-700 dark:text-gray-200 text-sm line-clamp-3">
                {{$getRecord()->description}}
            </p>
        </div>
        <div class="flex items-center justify-center flex-wrap gap-2 px-2 pb-2">
            <span class="bg-{{ $getRecord()->status->getColor() }}-600 rounded-full px-2 py-1 text-xs font-semibold text-gray-100 shadow-md">
                {{$getRecord()->status}}
            </span>
            <span class="bg-teal-600 rounded-full px-2 py-1 text-xs font-semibold text-gray-100 shadow-md">{{$getRecord()->type}}</span>
            <span class="bg-{{ $getRecord()->mode_of_delivery->getColor() }}-600 rounded-full px-2 py-1 text-xs font-semibold text-gray-100 shadow-md">{{$getRecord()->mode_of_delivery}}</span>
        </div>
        <div class="flex items-center justify-center my-2 gap-4">
            <img class="w-10 h-10 rounded-full" src="{{$getRecord()->trainingProvider->profile_photo_url}}" alt="Avatar of Jonathan Reinink">
            <div class="text-sm">
                @if($getRecord()->trainingProvider->trainingProvider)
                <p class="text-gray-900 dark:text-gray-200 leading-none">{{$getRecord()->trainingProvider->trainingProvider->institution_name ?? null}}</p>
                @else
                <p class="text-gray-900 dark:text-gray-200 leading-none">{{$getRecord()->trainingProvider->name ?? null}}</p>
                @endif
                <p class="text-gray-600 dark:text-gray-400">{{$getRecord()->start_date->diffForHumans()}}</p>
            </div>
            <div>
                @guest
                <p>
                    ${{$getRecord()->regular_price}}
                </p>
                @endguest
                @auth
                ${{$getRecord()->member_price}}
                @endauth
            </div>
        </div>
    </a>
</div>