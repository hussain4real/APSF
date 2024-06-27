<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>


<nav>


    <style>
        @media only screen and (min-width: 992px) and (max-width: 1500px) {
            #main-menu-wrapper {

                padding-right: 2rem;
                overflow-wrap: normal;
            }
        }

        .flex-wrapper-for-translation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            gap: 2rem;
        }

        #scroll-container {
            border-radius: 0.5rem;
            overflow: hidden;
            width: 100%;
            display: flex;
        }

        .ticker {
            font-size: 1.5rem;
            font-weight: bold;
            padding: 0.5rem;
            background-color: rgb(2 55 49 / 1);
            color: #e56131;
            width: max-content;
            text-align: start;
        }

        .language-switcher {
            width: 20rem;
        }

        #scroll-text {
            width: max-content;
            background-color: #e56131;
            color: white;
            padding: 0.5rem;
            font-size: 1rem;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            /* animation properties */
            transform: translateX(100%);
            animation: my-animation 15s linear infinite;
        }

        @keyframes my-animation {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        body[dir="rtl"] #scroll-text {
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-top-left-radius: 0.5rem;
            border-bottom-left-radius: 0.5rem;
            text-align: end;
            transform: translateX(-100%);
            animation: my-animation-rtl 15s linear infinite;
        }

        body[dir="rtl"] #scroll-container {}

        @keyframes my-animation-rtl {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(100%);
            }
        }

        .main-menu-4.menu-anim {
            position: relative;
            display: inline-block;
        }

        .notification {
            display: inline-block;
            margin-right: -1rem;
        }

        .main-menu-4.menu-anim .dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            min-width: 20rem;
            background-color: white;
            border-radius: 0.25rem;
            padding: 0.5rem 0;
            margin-top: 0.125rem;
            z-index: 1000;
            display: none;
        }

        .main-menu-4.menu-anim .dropdown.show {
            display: block;
        }

        .main-menu-4.menu-anim .dropdown-link {
            display: block;
            padding: 0.5rem 1.5rem;
            clear: both;
            font-weight: 400;
            color: #212529;
            text-align: inherit;
            white-space: nowrap;
            background-color: transparent;
            border: 0;
        }

        .main-menu-4.menu-anim .dropdown-link:hover {
            color: #16181b;
            text-decoration: none;
            background-color: #f8f9fa;
        }

        .main-menu-4.menu-anim .dropdown-link:focus {
            color: #16181b;
            text-decoration: none;
            background-color: #f8f9fa;
        }

        .main-menu-4.menu-anim button {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #6b7280;
            background-color: #ffffff;
            border-radius: 0.375rem;
            border-width: 1px;
            border-color: transparent;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .main-menu-4.menu-anim button:hover {
            color: #4b5563;
            background-color: #f9fafb;
        }

        .main-menu-4.menu-anim button:focus {
            outline: 0;
            color: #4b5563;
            background-color: #f9fafb;
            box-shadow: 0 0 0 3px rgba(96, 165, 250, 0.5);
        }

        .main-menu-4.menu-anim button svg {
            height: 1.5em;
            width: 1.5em;
        }

        .main-menu-4.menu-anim button svg path.inline-flex {
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-width: 2;
        }

        .main-menu-4.menu-anim button svg path.hidden {
            display: none;
        }

        .main-menu-4.menu-anim button:focus svg path.inline-flex {
            stroke: #4b5563;
        }

        .main-menu-4.menu-anim button:focus svg path.hidden {
            display: inline;
        }

        .main-menu-4.menu-anim button:focus svg path.hidden {
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-width: 2;
        }
    </style>
    <header class="header__area-7">

        {{-- @include('partials/language_switcher')--}}
        <div class="header__inner-2">
            <div class="header__logo-2">
                <a href="/" class="logo-dark"><img src="{{asset('assets/imgs/apsf/logo/apsflogo_271x69.webp')}}" alt="Site Logo"></a>
                <a href="/" class="logo-light"><img src="{{ asset('assets/imgs/apsf/logo/apsflogo_white.png') }}" alt="Site Logo"></a>

            </div>

            <div class="header__nav-2">
                <div class="flex-wrapper-for-translation">

                    <div id="scroll-container">
                        <h4 class="ticker">{{__('frontend.announcement.heading')}} </h4>
                        <div id="scroll-text">{{__('frontend.announcement.description')}}<div>
                            </div>
                        </div>
                    </div>


                    <div class="language-switcher">

                        @include('partials/language_switcher')
                    </div>
                </div>
                {{-- animation style class: menu-anim--}}
                <ul class="main-menu-4 " id="main-menu-wrapper">

                    <li><a href="{{ route('welcome') }}">{{__('nav.Home')}}</a></li>

                    <li><a href="{{ route('about') }}">{{__('nav.About Us')}}</a></li>
                    <li><a href="#">{{__('nav.Committee')}}</a>
                        <ul class="main-dropdown">
                            <li><a href="{{ route('founders-committee') }}">{{__('nav.Founders Committee')}}</a></li>
                            <li><a href="{{ route('board-of-trustees.index') }}">{{__('nav.Board of Trustees')}}</a></li>
                            <li><a href="{{ route('general-secretariat') }}">{{__('nav.General Secretariat')}}</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('services') }}">{{__('nav.Services')}}</a>
                    <li><a href="{{ route('membership') }}">{{__('nav.Membership')}}</a>

                        <!-- <ul class="main-dropdown">
              <li><a href="#">Academic Support</a></li>
              <li><a href="#">Professional Development</a></li>
              <li><a href="#">Student Support</a></li>
              <li><a href="#">Advocacy & Representation</a></li>
              <li><a href="#">Programs & Initiatives</a></li>
              <li><a href="#">Membership</a></li>
            </ul> -->
                    </li>
                    <li><a href="{{ route('events.index') }}">{{__('nav.Events')}}</a></li>
                    {{-- <li><a href="{{ route('pricing') }}" >{{__('Pricing')}}</a></li>--}}
                    <li><a href="{{ route('contact') }}">{{__('nav.Contact Us')}}</a></li>
                    <li><a href="{{ route('training-programs.list') }}">{{__('nav.Training Programs')}}</a></li>
                    @guest
                    <li>

                        <span class="header__nav-icon-6">
                            <i class="fa-solid fa-user"></i>
                            <a href="{{ route('filament.admin.auth.login') }}">{{__('nav.Login')}}</a>
                        </span>
                    </li>
                    </li>
                </ul>

                @endguest
                @auth

                <!-- Settings Dropdown -->
                <div class="main-menu-4 menu-anim">

                    <x-dropdown align="right" width="20">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div x-data="{{ json_encode([
                                            'name' => auth()->user()->name,
                                        ]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name">

                                </div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <span class="notification">

                                <a href="route('filament.admin.pages.dashboard')">

                                    @livewire('database-notifications')

                                </a>
                            </span>
                            <x-dropdown-link :href="route('filament.admin.pages.dashboard')">
                                {{ 'Dashboard' }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('filament.admin.pages.my-profile')">
                                {{ __('Profile') }}
                            </x-dropdown-link>



                            <!-- Authentication -->
                            <button wire:click="logout" class="w-full text-start">
                                <x-dropdown-link>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </button>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Hamburger -->

                @endauth
                </ul>
            </div>



            <div class="header__nav-icon-7">
                <button class="menu-icon-2" id="open_offcanvas"><img src="{{asset('assets/imgs/apsf/icon/menu-dark.png')}}" alt="Menubar Icon"></button>
            </div>
        </div>
    </header>

    <!-- @include('announcement.contest') -->

    <!-- Offcanvas area start -->
    <livewire:layout.offcanvas-navigation />

    <!-- Offcanvas area end -->
</nav>