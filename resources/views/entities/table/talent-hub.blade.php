<style>
    /* .fi-ta-record {
       
        background-color: rgba(3, 55, 49, 0.8) !important;
        transition: all 0.5s ease-in-out;
    } */

    .justify-start {
        justify-content: center !important;
    }

    .ps-4,
    .pe-4,
    .py-4,
    .p-y-3 {
        /* display: none; */
        padding-top: 0 !important;
        padding-bottom: 0rem !important;
        padding-inline-start: 0 !important;
        padding-inline-end: 0 !important;

    }

    .gap-y-3 {
        row-gap: 0 !important;
    }

    /* .fi-ta-record:hover {
     
        background-color: rgba(228, 97, 46, 0.8) !important;
        transition: all 0.5s ease-in-out;

    } */

    /* .fi-modal-window {
        margin-top: rem;
    } */
    /* from medium screen up  */
    /* @media (min-width: 768px) {
        .fi-modal-window {
            margin-top: 40rem !important;
        }
    } */

    .fi-in-entry-wrp-label .text-sm {
        font-size: 1.2rem !important;

    }
</style>

<div class="flex flex-col justify-center mt-2">
    <div class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-2 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
        <div class="w-full md:w-1/3 bg-white grid place-items-center">
            <!-- <img src="https://images.unsplash.com/photo-1508528075895-be7a6cabd37a?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fG1vdW50YWluJTIwd2F0ZXJmYWxsfGVufDB8fDB8fHww" alt="tailwind logo" class="rounded-xl" /> -->

            <img src="{{$getRecord()->user->profile_photo_url}}" alt="tailwind logo" class="rounded-xl" />
        </div>
        <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
            <div class="flex justify-between item-center">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 4a1 1 0 011-1h10a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V4zm2 0v10h8V4H5zm0 12h8v2H5v-2z" />
                    </svg>


                    <p class="text-teal-800 bg-teal-200 rounded px-1 font-medium ">{{$getRecord()->subject_taught}}</p>
                </div>
                <div class="flex items-center">
                    <!-- <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg> -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M3 3v14h2V9h9l-1.5-3L14 3H3z" />
                    </svg>


                    <!-- country flag and name -->
                    <p class="text-gray-600 font-medium ml-1">
                        {{$getRecord()->country}}
                    </p>
                    <!-- <p class="text-gray-600 font-bold text-sm ml-1">
                        4.96
                        <span class="text-gray-500 font-normal">(76 reviews)</span>
                    </p> -->
                </div>
                <!-- <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-pink-500" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                    </svg>
                </div> -->
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2L2 6l8 4 8-4-8-4zM2 8l8 4 8-4v6a2 2 0 01-1 1.73l-7 4-7-4A2 2 0 012 14V8z" />
                    </svg>

                    <div class="bg-orange-200 px-1 py-1 rounded-full text-xs font-medium text-orange-800 hidden md:block">
                        {{$getRecord()->qualification}}
                    </div>
                </div>
            </div>
            <h3 class="font-semibold text-gray-800 md:text-3xl text-xl">{{$getRecord()->user->name}}</h3>
            @unless ($getRecord()->bio)

            <p class="md:text-lg text-gray-500 text-base mb-4">Passionate educator dedicated to inspiring students through engaging and interactive learning experiences</p>
            <p class="mt-4">
                @else
            <div x-data="{ expanded: false, lines: 0 }" x-init="lines = $refs.content.scrollHeight / parseFloat(getComputedStyle($refs.content)['lineHeight'])">

                <p class="md:text-lg text-gray-500 text-base prose line-clamp-5 text-pretty" x-show="!expanded" x-ref="content">
                    {{$getRecord()->bio}}
                </p>
                <p class="md:text-lg text-gray-500 text-base prose text-pretty" x-show="expanded">
                    {{$getRecord()->bio}}
                </p>
                <button type="button" x-on:click="expanded = ! expanded" x-show="lines > 4">
                    <span x-show="! expanded" class="text-teal-600 mb-4">Show more...</span>
                    <span x-show="expanded" class="text-orange-600 mb-4">Show less...</span>
                </button>
            </div>

            @endunless

            <p>
                <span @class([ 'text-md font-normal rounded px-1 py-1' , 'bg-green-200 text-green-800'=> $getRecord()->availability == 'full-time',
                    'bg-yellow-200 text-yellow-800' => $getRecord()->availability == 'part-time',
                    'bg-blue-200 text-blue-800' => $getRecord()->availability == 'contract',
                    'bg-red-200 text-red-800' => $getRecord()->availability == 'temporary',
                    'bg-pink-200 text-pink-800' => $getRecord()->availability == 'remote',
                    'bg-gray-200 text-gray-800' => $getRecord()->availability == 'unavailable',
                    'bg-orange-200 text-orange-800' => $getRecord()->availability == 'other',
                    ])>
                    {{$getRecord()->availability}}
                </span>
                <span @class([ 'font-normal text-base mx-4 rounded px-1 py-1' , 'text-green-800 bg-green-200'=> $getRecord()->status == 'active',
                    'text-gray-800 bg-gray-200' => $getRecord()->status == 'inactive',
                    'text-yellow-800 bg-yellow-200' => $getRecord()->status == 'pending',
                    'text-red-800 bg-red-200' => $getRecord()->status == 'suspended',
                    ])>
                    {{$getRecord()->status}}
                </span>
            </p>
        </div>
    </div>
</div>



<!-- <div class="relative m-10 flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
    <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
        <img class="object-cover" src="https://images.unsplash.com/photo-1600185365483-26d7a4cc7519?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OHx8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60" alt="product image" />
        <span class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">39% OFF</span>
    </a>
    <div class="mt-4 px-5 pb-5">
        <a href="#">
            <h5 class="text-xl tracking-tight text-slate-900">Nike Air MX Super 2500 - Red</h5>
        </a>
        <div class="mt-2 mb-5 flex items-center justify-between">
            <p>
                <span class="text-3xl font-bold text-slate-900">$449</span>
                <span class="text-sm text-slate-900 line-through">$699</span>
            </p>
            <div class="flex items-center">
                <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <svg aria-hidden="true" class="h-5 w-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                </svg>
                <span class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xs font-semibold">5.0</span>
            </div>
        </div>
        <a href="#" class="flex items-center justify-center rounded-md bg-slate-900 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            Add to cart</a>
    </div>
</div> -->