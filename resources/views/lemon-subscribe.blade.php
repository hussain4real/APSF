<x-app-layout>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />


    <div class="fixed top-16 left-16 -right-16 w-full max-w-sm mx-auto container my-36 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">{{$subscriptionName}}</h5>
        <div class="flex items-baseline text-gray-900 dark:text-white">
            <span class="text-3xl font-semibold"></span>
{{--            @foreach($subscriptionPrice as $price)--}}
            <span class="text-5xl font-extrabold tracking-tight">OMR {{$subscriptionPrice}}</span>
{{--            @endforeach--}}
            <span class="ms-1 text-xl font-normal text-gray-500 dark:text-gray-400">/year</span>
        </div>
        <ul role="list" class="space-y-5 my-7">
            <li class="flex items-center">
                <svg class="flex-shrink-0 w-4 h-4 text-teal-700 dark:text-teal-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">2 team members</span>
            </li>
            <li class="flex">
                <svg class="flex-shrink-0 w-4 h-4 text-teal-700 dark:text-teal-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">20GB Cloud storage</span>
            </li>
            <li class="flex">
                <svg class="flex-shrink-0 w-4 h-4 text-teal-700 dark:text-teal-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Integration help</span>
            </li>
            <li class="flex line-through decoration-gray-500">
                <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="text-base font-normal leading-tight text-gray-500 ms-3">Sketch Files</span>
            </li>
            <li class="flex line-through decoration-gray-500">
                <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="text-base font-normal leading-tight text-gray-500 ms-3">API Access</span>
            </li>
            <li class="flex line-through decoration-gray-500">
                <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="text-base font-normal leading-tight text-gray-500 ms-3">Complete documentation</span>
            </li>
            <li class="flex line-through decoration-gray-500">
                <svg class="flex-shrink-0 w-4 h-4 text-gray-400 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <span class="text-base font-normal leading-tight text-gray-500 ms-3">24×7 phone & email support</span>
            </li>
        </ul>
        <button type="button" class="text-white bg-green-700 hover:bg-teal-800 focus:ring-4 focus:outline-none focus:ring-teal-200 dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center">
            <x-lemon-button :href="$checkout" >
                Subscribe
            </x-lemon-button>
        </button>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</x-app-layout>
