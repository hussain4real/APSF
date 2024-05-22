<!--
Install the "flowbite-typography" NPM package to apply styles and format the article content:

URL: https://flowbite.com/docs/components/typography/
-->
<x-home-layout>
{{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />--}}

{{--    <main class="mt-14 pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">--}}
{{--        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">--}}
{{--        <article class="mx-auto w-full max-w-2xl lg:max-w-screen-lg format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">--}}
{{--            <header class="mb-4 lg:mb-6 not-format">--}}
{{--                <address class="flex items-center mb-6 not-italic">--}}
{{--                    <div class="inline-flex items-center gap-4 mr-3 text-sm text-gray-900 dark:text-white">--}}
{{--                        <img class="w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">--}}
{{--                        <div>--}}
{{--                            <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">Rebhi Hatamleh</a>--}}
{{--                            <p class="text-base text-gray-500 dark:text-gray-400">Editor in Chief, Arab Private Schools Federation</p>--}}
{{--                            <p class="text-base text-gray-500 dark:text-gray-400"><time pubdate datetime="{{$event->event_date}}" title="{{$event->event_date}}">{{$event->event_date}}</time></p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </address>--}}
{{--                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">--}}
{{--                    {{$event->event_title}}</h1>--}}
{{--            </header>--}}
{{--            <p class="lead my-2 ">{{$event->event_excerpt}}</p>--}}
{{--            @forelse($videos as $video)--}}
{{--                <div  class="w-full flex z-50">--}}
{{--                    <video class="w-full h-[20rem] object-cover rounded-lg shadow-sm z-50" controls autoplay muted loop>--}}
{{--                        <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">--}}
{{--                        Your browser does not support the video tag.--}}
{{--                    </video>--}}
{{--                    <button class="pip-button inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">--}}
{{--                        Enter PiP--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            @empty--}}

{{--            <figure><img src="{{asset('assets/imgs/apsf/story/920x450 banner copy.webp')}}" alt="">--}}
{{--                <figcaption class="my-1 text-center">Digital art by Anonymous</figcaption>--}}
{{--            </figure>--}}
{{--            @endforelse--}}
{{--            <p class="my-4 antialiased text-lg lg:text-xl xl:text-2xl">{{$event->event_description}}</p>--}}

{{--            image Carousel--}}

{{--            <div class="carousel">--}}
{{--                <div class="carousel-inner">--}}
{{--                    @forelse($images as $index => $image)--}}
{{--                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">--}}
{{--                            <img src="{{$image->getUrl() }}" alt="Image {{ $index + 1 }}">--}}
{{--                        </div>--}}
{{--                    @empty--}}
{{--                        <p>No images available</p>--}}
{{--                    @endforelse--}}
{{--                </div>--}}
{{--                @if($images->count() > 1)--}}
{{--                    <button class="carousel-control prev" onclick="prevSlide()">&#10094;</button>--}}
{{--                    <button class="carousel-control next" onclick="nextSlide()">&#10095;</button>--}}
{{--                @endif--}}
{{--            </div>--}}

{{--            <section class="not-format my-4">--}}
{{--                <div class="flex justify-between items-center mb-6">--}}
{{--                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion (20)</h2>--}}
{{--                </div>--}}
{{--                <form class="mb-6">--}}
{{--                    <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">--}}
{{--                        <label for="comment" class="sr-only">Your comment</label>--}}
{{--                        <textarea id="comment" rows="6"--}}
{{--                                  class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"--}}
{{--                                  placeholder="Write a comment..." required></textarea>--}}
{{--                    </div>--}}
{{--                    <button type="submit"--}}
{{--                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">--}}
{{--                        Post comment--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--                <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">--}}
{{--                    <footer class="flex justify-between items-center mb-2">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img--}}
{{--                                    class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                    src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"--}}
{{--                                    alt="Michael Gough">Michael Gough</p>--}}
{{--                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"--}}
{{--                                                                                      title="February 8th, 2022">Feb. 8, 2022</time></p>--}}
{{--                        </div>--}}
{{--                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"--}}
{{--                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                                type="button">--}}
{{--                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                            </svg>--}}
{{--                            <span class="sr-only">Comment settings</span>--}}
{{--                        </button>--}}
{{--                        <!-- Dropdown menu -->--}}
{{--                        <div id="dropdownComment1"--}}
{{--                             class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                                aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </footer>--}}
{{--                    <p>Very straight-to-point article. Really worth time reading. Thank you! But tools are just the--}}
{{--                        instruments for the UX designers. The knowledge of the design tools are as important as the--}}
{{--                        creation of the design strategy.</p>--}}
{{--                    <div class="flex items-center mt-4 space-x-4">--}}
{{--                        <button type="button"--}}
{{--                                class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">--}}
{{--                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">--}}
{{--                                <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>--}}
{{--                            </svg>--}}
{{--                            Reply--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--                <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">--}}
{{--                    <footer class="flex justify-between items-center mb-2">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img--}}
{{--                                    class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"--}}
{{--                                    alt="Jese Leos">Jese Leos</p>--}}
{{--                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-12"--}}
{{--                                                                                      title="February 12th, 2022">Feb. 12, 2022</time></p>--}}
{{--                        </div>--}}
{{--                        <button id="dropdownComment2Button" data-dropdown-toggle="dropdownComment2"--}}
{{--                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                                type="button">--}}
{{--                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                            </svg>--}}
{{--                            <span class="sr-only">Comment settings</span>--}}
{{--                        </button>--}}
{{--                        <!-- Dropdown menu -->--}}
{{--                        <div id="dropdownComment2"--}}
{{--                             class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                                aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </footer>--}}
{{--                    <p>Much appreciated! Glad you liked it ☺️</p>--}}
{{--                    <div class="flex items-center mt-4 space-x-4">--}}
{{--                        <button type="button"--}}
{{--                                class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">--}}
{{--                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">--}}
{{--                                <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>--}}
{{--                            </svg>--}}
{{--                            Reply--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--                <article class="p-6 mb-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">--}}
{{--                    <footer class="flex justify-between items-center mb-2">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img--}}
{{--                                    class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                    src="https://flowbite.com/docs/images/people/profile-picture-3.jpg"--}}
{{--                                    alt="Bonnie Green">Bonnie Green</p>--}}
{{--                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-03-12"--}}
{{--                                                                                      title="March 12th, 2022">Mar. 12, 2022</time></p>--}}
{{--                        </div>--}}
{{--                        <button id="dropdownComment3Button" data-dropdown-toggle="dropdownComment3"--}}
{{--                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                                type="button">--}}
{{--                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                            </svg>--}}
{{--                            <span class="sr-only">Comment settings</span>--}}
{{--                        </button>--}}
{{--                        <!-- Dropdown menu -->--}}
{{--                        <div id="dropdownComment3"--}}
{{--                             class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                                aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </footer>--}}
{{--                    <p>The article covers the essentials, challenges, myths and stages the UX designer should consider while creating the design strategy.</p>--}}
{{--                    <div class="flex items-center mt-4 space-x-4">--}}
{{--                        <button type="button"--}}
{{--                                class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">--}}
{{--                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">--}}
{{--                                <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>--}}
{{--                            </svg>--}}
{{--                            Reply--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--                <article class="p-6 text-base bg-white border-t border-gray-200 dark:border-gray-700 dark:bg-gray-900">--}}
{{--                    <footer class="flex justify-between items-center mb-2">--}}
{{--                        <div class="flex items-center">--}}
{{--                            <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-900 dark:text-white"><img--}}
{{--                                    class="mr-2 w-6 h-6 rounded-full"--}}
{{--                                    src="https://flowbite.com/docs/images/people/profile-picture-4.jpg"--}}
{{--                                    alt="Helene Engels">Helene Engels</p>--}}
{{--                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-06-23"--}}
{{--                                                                                      title="June 23rd, 2022">Jun. 23, 2022</time></p>--}}
{{--                        </div>--}}
{{--                        <button id="dropdownComment4Button" data-dropdown-toggle="dropdownComment4"--}}
{{--                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:text-gray-400 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"--}}
{{--                                type="button">--}}
{{--                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">--}}
{{--                                <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>--}}
{{--                            </svg>--}}
{{--                        </button>--}}
{{--                        <!-- Dropdown menu -->--}}
{{--                        <div id="dropdownComment4"--}}
{{--                             class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">--}}
{{--                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"--}}
{{--                                aria-labelledby="dropdownMenuIconHorizontalButton">--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="#"--}}
{{--                                       class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </footer>--}}
{{--                    <p>Thanks for sharing this. I do came from the Backend development and explored some of the tools to design my Side Projects.</p>--}}
{{--                    <div class="flex items-center mt-4 space-x-4">--}}
{{--                        <button type="button"--}}
{{--                                class="flex items-center font-medium text-sm text-gray-500 hover:underline dark:text-gray-400">--}}
{{--                            <svg class="mr-1.5 w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">--}}
{{--                                <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>--}}
{{--                            </svg>--}}
{{--                            Reply--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </article>--}}
{{--            </section>--}}
{{--        </article>--}}
{{--    </div>--}}
{{--    </main>--}}

{{--    <aside aria-label="Related articles" class="py-8 lg:py-24 bg-gray-50 dark:bg-gray-800">--}}
{{--    <div class="px-4 mx-auto max-w-screen-xl">--}}
{{--        <h2 class="mb-8 text-2xl font-bold text-gray-900 dark:text-white">Related articles</h2>--}}
{{--        <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-4">--}}
{{--            <article class="max-w-xs">--}}
{{--                <a href="#">--}}
{{--                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-1.png" class="mb-5 rounded-lg" alt="Image 1">--}}
{{--                </a>--}}
{{--                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">--}}
{{--                    <a href="#">Our first office</a>--}}
{{--                </h2>--}}
{{--                <p class="mb-4 text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>--}}
{{--                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">--}}
{{--                    Read in 2 minutes--}}
{{--                </a>--}}
{{--            </article>--}}
{{--            <article class="max-w-xs">--}}
{{--                <a href="#">--}}
{{--                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-2.png" class="mb-5 rounded-lg" alt="Image 2">--}}
{{--                </a>--}}
{{--                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">--}}
{{--                    <a href="#">Enterprise design tips</a>--}}
{{--                </h2>--}}
{{--                <p class="mb-4  text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>--}}
{{--                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">--}}
{{--                    Read in 12 minutes--}}
{{--                </a>--}}
{{--            </article>--}}
{{--            <article class="max-w-xs">--}}
{{--                <a href="#">--}}
{{--                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-3.png" class="mb-5 rounded-lg" alt="Image 3">--}}
{{--                </a>--}}
{{--                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">--}}
{{--                    <a href="#">We partnered with Google</a>--}}
{{--                </h2>--}}
{{--                <p class="mb-4  text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>--}}
{{--                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">--}}
{{--                    Read in 8 minutes--}}
{{--                </a>--}}
{{--            </article>--}}
{{--            <article class="max-w-xs">--}}
{{--                <a href="#">--}}
{{--                    <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/article/blog-4.png" class="mb-5 rounded-lg" alt="Image 4">--}}
{{--                </a>--}}
{{--                <h2 class="mb-2 text-xl font-bold leading-tight text-gray-900 dark:text-white">--}}
{{--                    <a href="#">Our first project with React</a>--}}
{{--                </h2>--}}
{{--                <p class="mb-4  text-gray-500 dark:text-gray-400">Over the past year, Volosoft has undergone many changes! After months of preparation.</p>--}}
{{--                <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-primary-600 dark:text-primary-500 hover:no-underline">--}}
{{--                    Read in 4 minutes--}}
{{--                </a>--}}
{{--            </article>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</aside>--}}

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>--}}
    <main class="main-container">
        <div class="content-container">
            <article class="article-container">
                <header class="article-header">
                    <address class="article-address">
                        <div class="author-info">
                            <img class="author-img" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="author-name">Rebhi Hatamleh</a>
                                <p class="author-title">Editor in Chief, Arab Private Schools Federation</p>
                                <p class="author-date"><time pubdate datetime="{{$event->event_date}}" title="{{$event->event_date}}">{{$event->event_date}}</time></p>
                            </div>
                        </div>
                    </address>
                    <h1 class="article-title">{{$event->event_title}}</h1>
                </header>
                <p class="lead-text">{{$event->event_excerpt}}</p>
                @forelse($videos as $video)
                    <div class="video-container">
                        <video class="video-element" controls autoplay muted loop>
                            <source src="{{ $video->getUrl() }}" type="{{ $video->mime_type }}">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @empty
                    <figure>
                        <img src="{{asset('assets/imgs/apsf/story/920x450 banner copy.webp')}}" alt="">
                        <figcaption class="image-caption">Digital art by Anonymous</figcaption>
                    </figure>
                @endforelse
                <p class="description-text">{{$event->event_description}}</p>

                <!-- Image Carousel -->

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        @if($images)
                            @foreach($images as $image)
                            <div class="carousel-item @if($loop->first) active @endif ">
                                <img class="{{$image->id}}-slide rounded mx-auto d-block h-50" src="{{$image->getUrl()}}" alt="{{$image->id}} slide">
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <section class="discussion-section">
                    <div class="discussion-header">
                        <h2 class="discussion-title">Discussion (20)</h2>
                    </div>
                    <form class="comment-form">
                        <div class="comment-input-container">
                            <label for="comment" class="sr-only">Your comment</label>
                            <textarea id="comment" rows="6" class="comment-textarea" placeholder="Write a comment..." required></textarea>
                        </div>
                        <button type="submit" class="comment-button">Post comment</button>
                    </form>
                </section>
            </article>
        </div>
    </main>

</x-home-layout>
<style>

    .main-container {
        margin-top: 3.5rem;
        padding-top: 2rem;
        padding-bottom: 4rem;
        background-color: #ffffff;
    }

    @media (min-width: 1024px) {
        .main-container {
            padding-top: 4rem;
            padding-bottom: 6rem;
        }
    }

    .content-container {
        display: flex;
        justify-content: space-between;
        padding-left: 1rem;
        padding-right: 1rem;
        max-width: 1200px;
        margin: auto;
    }

    .article-container {
        width: 100%;
        max-width: 700px;
        margin: auto;
    }

    @media (min-width: 1024px) {
        .article-container {
            max-width: 1200px;
        }
    }

    .article-header {
        margin-bottom: 1rem;
    }

    @media (min-width: 1024px) {
        .article-header {
            margin-bottom: 1.5rem;
        }
    }

    .article-address {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .author-info {
        display: inline-flex;
        align-items: center;
        gap: 1rem;
        margin-right: 0.75rem;
        color: #1a202c;
    }

    .author-img {
        width: 4rem;
        height: 4rem;
        border-radius: 9999px;
    }

    .author-name {
        font-size: 1.25rem;
        font-weight: bold;
        color: #1a202c;
    }

    .author-title, .author-date {
        font-size: 1rem;
        color: #6b7280;
    }

    .article-title {
        margin-bottom: 1rem;
        font-size: 1.875rem;
        font-weight: 800;
        line-height: 1.25;
        color: #1a202c;
    }

    @media (min-width: 1024px) {
        .article-title {
            margin-bottom: 1.5rem;
            font-size: 2.25rem;
        }
    }

    .lead-text {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        font-size: 1.125rem;
        line-height: 1.75rem;
        color: #1a202c;
    }

    .video-container {
        width: 100%;
        display: flex;
        z-index: 50;
    }

    .video-element {
        width: 100%;
        height: 35rem;
        object-fit: cover;
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        z-index: 50;
    }

    .image-caption {
        margin-top: 0.5rem;
        margin-bottom: 0.5rem;
        text-align: center;
        color: #1a202c;
    }

    .description-text {
        margin-top: 1rem;
        margin-bottom: 1rem;
        font-size: 1.125rem;
        line-height: 1.75rem;
        color: #1a202c;
    }

    @media (min-width: 1024px) {
        .description-text {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }
    }
 .carousel-item img{
     height: 10rem;
 }


    .discussion-section {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .discussion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .discussion-title {
        font-size: 1.125rem;
        font-weight: bold;
        color: #1a202c;
    }

    @media (min-width: 1024px) {
        .discussion-title {
            font-size: 1.25rem;
        }
    }

    .comment-form {
        margin-bottom: 1.5rem;
    }

    .comment-input-container {
        padding: 0.5rem;
        background-color: #ffffff;
        border: 1px solid #d1d5db;
        border-radius: 0.5rem;
        margin-bottom: 1rem;
    }

    .comment-textarea {
        width: 100%;
        padding: 0.5rem;
        font-size: 1rem;
        color: #1a202c;
        border: none;
        outline: none;
        background-color: #ffffff;
        resize: none;
    }

    .comment-textarea::placeholder {
        color: #9ca3af;
    }

    .comment-button {
        display: inline-flex;
        align-items: center;
        padding: 0.625rem 1rem;
        font-size: 0.75rem;
        font-weight: normal;
        color: #ffffff;
        background-color: #1d4ed8;
        border-radius: 0.5rem;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s;
    }

    .comment-button:hover {
        background-color: #1e40af;
    }

</style>


<script>

    $(document).ready(function() {
        console.log('dom ready for implementation');
        $('.carousel').carousel('cycle');
    });

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
                if (entry.isIntersecting || entry.target === document.pictureInPictureElement) {
                    entry.target.play();
                } else {
                    entry.target.pause();
                }
            });
        }





    });
</script>
