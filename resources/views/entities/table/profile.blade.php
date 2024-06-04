<!-- https://gist.github.com/goodreds/5b8a4a2bf11ff67557d38c5e727ea86c -->

<div class="max-w-2xl sm:max-w-sm md:max-w-sm lg:max-w-sm xl:max-w-xl bg-white shadow-md rounded-lg text-gray-900">
    <div class="rounded-t-lg h-32 overflow-hidden">
        <img class="object-cover object-top w-full" src='https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ' alt='Mountain'>
    </div>
    <div class="mx-auto w-32 h-32 relative -mt-16 border-4 border-white rounded-full overflow-hidden">
        @if($getRecord()->profile_photo_url)
        <img class="object-cover object-center h-32" src='{{$getRecord()?->profile_photo_url ?? null}}' alt='Woman looking front'>
        @else
        <img class="object-cover object-center h-32" src='{{$getRecord()?->user?->profile_photo_url ?? null}}' alt="profile picture">
        @endif
    </div>
    <div class="text-center mt-2">
        <x-filament-tables::columns.layout :components="$getComponents()" :record="$getRecord()" :record-key="$recordKey" />


    </div>

    <ul class="py-4 mt-2 text-gray-700 flex items-center justify-around">
        <li class="flex flex-col items-center justify-around">
            <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
            </svg>
            <div class="">{{\Illuminate\Support\Number::abbreviate($getRecord()->reviews->count())}} reviews</div>
        </li>
        <li class="flex flex-col items-center justify-between">
            <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M7 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0 1c2.15 0 4.2.4 6.1 1.09L12 16h-1.25L10 20H4l-.75-4H2L.9 10.09A17.93 17.93 0 0 1 7 9zm8.31.17c1.32.18 2.59.48 3.8.92L18 16h-1.25L16 20h-3.96l.37-2h1.25l1.65-8.83zM13 0a4 4 0 1 1-1.33 7.76 5.96 5.96 0 0 0 0-7.52C12.1.1 12.53 0 13 0z" />
            </svg>
            <div>10k</div>
        </li>
        <li class="flex flex-col items-center justify-around">
            <svg class="w-4 fill-current text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9 12H1v6a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-6h-8v2H9v-2zm0-1H0V5c0-1.1.9-2 2-2h4V2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v1h4a2 2 0 0 1 2 2v6h-9V9H9v2zm3-8V2H8v1h4z" />
            </svg>
            <div>15</div>
        </li>
    </ul>

    <div class="p-4 border-t mx-8 mt-2 flex justify-between items-center">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFBF00" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
        </svg>
        <span class="text-slate-400 bg-amber-300/40 px-2 rounded-full">
         @if($getRecord() instanceof \App\Models\User)
            @if($getRecord()->student)
                Student
            @elseif($getRecord()->teacher)
                Teacher
            @elseif($getRecord()->member)
            Member
            @elseif($getRecord()->founder)
                Founder
            @elseif($getRecord()->trainingProvider)
                Training Provider
            @elseif($getRecord()->schools()->exists())
                Schools
            @elseif($getRecord()->contractor)
                Contractor
            @elseif($getRecord()->educationalConsultant)
                Consultant
            @else
                {{class_basename($getRecord())}}
            @endif
        @else
            {{class_basename($getRecord())}}
        @endif
        </span>
    </div>
</div>


{{--sample cards for courses--}}
{{--<div class="max-w-sm w-full lg:max-w-full lg:flex">--}}
{{--    <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">--}}
{{--    </div>--}}
{{--    <div class="border-r border-b border-l border-gray-400 lg:border-l-0 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">--}}
{{--        <div class="mb-8">--}}
{{--            <p class="text-sm text-gray-600 flex items-center">--}}
{{--                <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">--}}
{{--                    <path d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z" />--}}
{{--                </svg>--}}
{{--                Members only--}}
{{--            </p>--}}
{{--            <div class="text-gray-900 font-bold text-xl mb-2">Can coffee make you a better developer?</div>--}}
{{--            <p class="text-gray-700 text-base">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.</p>--}}
{{--        </div>--}}
{{--        <div class="flex items-center">--}}
{{--            <img class="w-10 h-10 rounded-full mr-4" src="/img/jonathan.jpg" alt="Avatar of Jonathan Reinink">--}}
{{--            <div class="text-sm">--}}
{{--                <p class="text-gray-900 leading-none">Jonathan Reinink</p>--}}
{{--                <p class="text-gray-600">Aug 18</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
