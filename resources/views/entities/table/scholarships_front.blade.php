@php
use App\ScholarshipStatus;

    $upcoming = ScholarshipStatus::UPCOMING;
    $ongoing = ScholarshipStatus::ONGOING;
    $closed = ScholarshipStatus::CLOSED;
    $suspended = ScholarshipStatus::SUSPENDED;
@endphp
<style>
 .fi-ta-record {
     /*display: none;*/
     background-color: rgba(255, 165, 0, 0.75) !important;
        transition: all 0.5s ease-in-out;
 }
 .fi-ta-record:hover{
     /*add some animation and effect*/
        background-color: rgba(3, 55, 49, 0.75) !important;
        transition: all 0.5s ease-in-out;

 }
</style>
<div class="max-w-full bg-white dark:bg-slate-700 text-gray-900 rounded-lg dark:text-gray-200 overflow-hidden">

    <!-- CARD 1 -->
    <div id="scholarship-card" class="overflow-hidden shadow-lg flex flex-col ">
        <div class="relative">
            <a href="{{$getRecord()->getUrl()}}" >
                @if($getRecord()->media()->exists())
                    {{--                    @dd($getRecord()->getFirstMediaUrl('scholarship_images'))--}}
                    <img class="w-full max-h-full h-[15rem] object-cover object-center"
                         src="{{$getRecord()->getFirstMediaUrl('scholarship_images')}}"
                         alt="Sunset in the mountains">
                @else
                    <img class="w-full max-h-full h-[15rem] object-cover object-center"
                         src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                         alt="Sunset in the mountains">
                @endif
                <div
                    class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-700 opacity-25">
                </div>
            </a>
            <a class="text-sm absolute -top-5 right-0 bg-indigo-600 px-4 py-2 rounded-b text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out" href="{{$getRecord()->getUrl()}}">
                <div
                    class="">
                    {{$getRecord()->status}}
                </div>
            </a>
        </div>
        <div class="px-6 py-6 mb-auto">
            <a href="{{$getRecord()->getUrl()}}"
               class="font-medium text-lg hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">{{$getRecord()->name}}</a>
            <div class=" text-base font-bold py-2 leading-none flex items-center justify-between">
                <span class="bg-white rounded-full text-teal-500">{{$getRecord()->country}}</span>
                <span class="bg-teal-500 rounded text-orange-300 py-2 px-3">{{$getRecord()->program}}</span>
            </div>
        </div>
        <div class="px-6 flex flex-row items-center justify-between ">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" version="1.1" id="Layer_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                         y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                         xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
{{--                    @dd($ongoing)--}}
                    @if($getRecord()->status === $upcoming)
                        <span class="ml-1">{{$getRecord()->start_date->diffForHumans()}}</span>
                    @elseif($getRecord()->status === $ongoing)
                        <span class="ml-1">{{$getRecord()->end_date->diffForHumans()}}</span>
                    @elseif($getRecord()->status === $closed)
                        <span class="ml-1">{{$getRecord()->end_date->diffForHumans()}}</span>
                    @elseif($getRecord()->status === $suspended)
                        <span class="ml-1">{{$getRecord()->end_date->diffForHumans()}}</span>
                    @else
                        <span class="ml-1">{{$getRecord()->start_date->diffForHumans()}}</span>
                    @endif
                </span>

                 <span href="#" class="py-0 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <!-- svg for enrollment -->
                    <svg height="13px" width="13px" version="1.1" id="Layer_1"
                         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                         y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                         xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M256,469.333 c-105.856,0-192-86.144-192-192S150.144,85.333,256,85.333S448,171.477,448,277.333S361.856,469.333,256,469.333z M256,128 c-58.88,0-106.667,47.787-106.667,106.667S197.12,341.333,256,341.333S362.667,293.547,362.667,234.667S314.88,128,256,128z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1">39 Enrolled</span>
                </span>
        </div>
    </div>
</div>
