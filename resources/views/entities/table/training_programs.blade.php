@php use App\TrainingStatus; @endphp
{{--sample cards for courses--}}
<div
    class="max-w-full bg-white dark:bg-slate-700 rounded-lg text-gray-900 dark:text-gray-200 overflow-hidden ">
    <img class="w-full max-h-full h-[13rem]" src="{{$getRecord()->media[0]->getUrl()}}" alt="Sunset in the mountains">
    {{--    @dd($getRecord())--}}
    <div class="px-2 py-4 text-center">
        <div class="font-bold text-xl mb-2">{{$getRecord()->title}}</div>
        <div class="flex items-center justify-around gap-1 text-gray-600 dark:text-gray-400 mb-1">
            <small class="text-gray-500 dark:text-gray-300">
                {{$getRecord()->instructor_name}}
            </small>
            <small class="flex justify-center items-center gap-1">
                <span style="width: 14px;">
                    <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="50" cy="50" r="50" fill="#9ca1a8"/>
                    <line x1="50" y1="55" x2="50" y2="10" stroke="white" stroke-width="10"/>
                    <line x1="55" y1="50" x2="80" y2="50" stroke="white" stroke-width="10"/>
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
        <span class="bg-{{ $getRecord()->status->getColor() }}-600 rounded-full px-2 py-1 text-xs font-semibold text-gray-100 shadow-md"

        >
            {{$getRecord()->status}}
        </span>
        <span
            class="bg-{{ $getRecord()->type->getColor() }}-600 rounded-full px-2 py-1 text-xs font-semibold text-gray-100 shadow-md">{{$getRecord()->type}}</span>
        <span
            class="bg-{{ $getRecord()->mode_of_delivery->getColor() }}-600 rounded-full px-2 py-1 text-xs font-semibold text-gray-100 shadow-md">{{$getRecord()->mode_of_delivery}}</span>
    </div>
    <div class="flex items-center justify-center my-2 gap-4">
        <img class="w-10 h-10 rounded-full" src="{{$getRecord()->trainingProvider->user->profile_photo_url}}"
             alt="Avatar of Jonathan Reinink">
        <div class="text-sm">
            <p class="text-gray-900 dark:text-gray-200 leading-none">{{$getRecord()->trainingProvider->institution_name}}</p>
            <p class="text-gray-600 dark:text-gray-400">{{$getRecord()->start_date->diffForHumans()}}</p>
        </div>
    </div>
</div>
