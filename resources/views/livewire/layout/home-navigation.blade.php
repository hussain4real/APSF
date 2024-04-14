<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
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

    <header class="header__area-7">
        <div class="header__inner-2">
            <div class="header__logo-2">
                <a href="/" class="logo-dark" wire:navigate><img src="assets/imgs/apsf/logo/apsflogo_271x69.webp"
                        alt="Site Logo"></a>
                <a href="/" class="logo-light" wire:navigate><img
                        src="{{ asset('assets/imgs/apsf/logo/apsflogo_white.png') }}" alt="Site Logo"></a>
            </div>
            <div class="header__nav-2">
                <ul class="main-menu-4 menu-anim">
                    <li><a href="{{ route('welcome') }}" wire:navigate>Home</a></li>
                    <li><a href="{{ route('about') }}" wire:navigate>About Us</a></li>
                    <li><a href="#">Committee</a>
                        <ul class="main-dropdown">
                            <li><a href="{{ route('founders-committee') }}" wire:navigate>Founders Committee</a></li>
                            <li><a href="{{ route('board-of-trustees') }}" wire:navigate>Board of Trustees</a></li>
                            <li><a href="{{ route('general-secretariat') }}" wire:navigate>General Secretariat</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('services') }}" wire:navigate>Services</a>
                        <!-- <ul class="main-dropdown">
              <li><a href="#">Academic Support</a></li>
              <li><a href="#">Professional Development</a></li>
              <li><a href="#">Student Support</a></li>
              <li><a href="#">Advocacy & Representation</a></li>
              <li><a href="#">Programs & Initiatives</a></li>
              <li><a href="#">Membership</a></li>
            </ul> -->
                    </li>
                    <li><a href="{{ route('events') }}" wire:navigate>Events</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    @guest
                        <li>

                            <span class="header__nav-icon-6">
                                <i class="fa-solid fa-user"></i>
                                <a href="{{ route('filament.admin.auth.login') }}">Login</a>
                            </span>
                        </li>
                    @endguest
                    @auth
                        <!-- Settings Dropdown -->
                        <div class="main-menu-4 menu-anim">
                            <x-dropdown align="right" width="20">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                        <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                                            x-on:profile-updated.window="name = $event.detail.name"></div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile')" wire:navigate>
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
                        <div class="-me-2 flex items-center sm:hidden">
                            <button @click="open = ! open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    @endauth
                </ul>
            </div>

            <div class="header__nav-icon-7">

                <button class="menu-icon-2" id="open_offcanvas"><img src="assets/imgs/apsf/icon/menu-dark.png"
                        alt="Menubar Icon"></button>
            </div>
        </div>
    </header>
    <!-- Offcanvas area start -->
    <livewire:layout.offcanvas-navigation />

    <!-- Offcanvas area end -->
    <style>

        .px-3 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {

            padding-bottom: 0.5rem;
        }

        .border-transparent {
            border-color: transparent;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .leading-4 {
            line-height: 1rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .hover-text-gray-700:hover {
            color: #374151;
        }

        .focus-outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .transition {
            transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 0.15s;
        }

        .ease-in-out {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        .duration-150 {
            transition-duration: 0.15s;
        }
    </style>
</nav>
