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

<style>
    .relative {
        position: relative;
    }

    .ml-3 {
        margin-left: 0.75rem;
    }

    .profile-button {
        display: flex;
        text-sm: small;
        border-width: 2px;
        border-color: transparent;
        border-radius: 9999px;
        transition: border-color 150ms ease-in-out;
    }

    .profile-button:focus {
        outline: none;
        border-color: #D1D5DB;
        /* gray-300 */
    }

    .profile-image {
        height: 10rem;
        width: 10rem;
        border-radius: 50%;
    }

    .menu-container {
        position: absolute;
        right: 0;
        margin-top: 0.5rem;
        width: 12rem;
        border-radius: 0.375rem;
        /* rounded-md */
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        /* shadow-lg */
        display: none;
        /* initially hidden */
    }

    .menu-container[x-show="open"] {
        display: block;
        /* show when 'open' is true */
    }

    .menu {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
        border-radius: 0.375rem;
        /* rounded-md */
        background-color: #FFFFFF;
        /* white */
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
        /* shadow-xs */
    }

    .menu-item {
        display: block;
        padding-left: 1rem;
        padding-right: 1rem;
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
        font-size: 0.875rem;
        /* text-sm */
        color: #4A5568;
        /* text-gray-700 */
    }

    .menu-item:hover {
        background-color: #F7FAFC;
        /* bg-gray-100 */
    }
</style>
<div class="offcanvas__area">
    <div class="offcanvas__body">
        <div class="offcanvas__left">
            <div class="offcanvas__logo">
                <a href="/" wire:navigate><img src="{{asset('assets/imgs/apsf/logo/apsflogo_271x69_white.webp')}}" alt="Offcanvas Logo"></a>
            </div>
          
            <div class="offcanvas__social">
                <h3 class="social-title">Follow Us</h3>
                <ul>
                    <li><a href="https://www.instagram.com/arab_psf/">Instagram</a></li>
                    <li><a href="https://www.facebook.com/ArabPSF">Facebook</a></li>
                    <li><a href="https://x.com/Arab_PSF">Twitter</a></li>
                    <li><a href="https://www.linkedin.com/company/102934601/admin/feed/posts/">LinkedIn</a></li>
                </ul>
            </div>
            <div class="offcanvas__links">
                <ul>
                    <li><a href="{{route('about')}}" wire:navigate>About APSF</a></li>
                    <li><a href="{{route('contact')}}" wire:navigate>{{__('nav.Contact Us')}}</a></li>
                    {{-- <li><a href="career.html" wire:navigate>Career</a></li>--}}
                    {{-- <li><a href="faq.html" wire:navigate>FAQs</a></li>--}}
                </ul>
            </div>
        </div>
        <div class="offcanvas__mid">
            <div class="offcanvas__menu-wrapper">
                <nav class="offcanvas__menu">
                    <ul class="">
                        @include('partials/language_switcher')
                        <li><a href="{{route('welcome')}}" wire:navigate>{{__('nav.Home')}}</a></li>
                        <li><a href="{{route('about')}}" wire:navigate>{{__('nav.About Us')}}</a></li>
                        <li><a>{{__('nav.Committee')}}</a>
                            <ul>
                                <li><a href="{{route('founders-committee')}}" wire:navigate>{{__('nav.Founders Committee')}}</a></li>
                                <li><a href="{{route('board-of-trustees.index')}}" wire:navigate>{{__('nav.Board of Trustees')}}</a></li>
                                <li><a href="{{route('general-secretariat')}}" wire:navigate>{{__('nav.General Secretariat')}}</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('services')}}" wire:navigate>{{__('nav.Services')}}</a></li>
                        <li><a href="{{route('membership')}}" wire:navigate>{{__('nav.Membership')}}</a></li>
                        <li><a href="{{route('events.index')}}" wire:navigate>{{__('nav.Events')}}</a></li>
                        <li><a href="{{route('contact')}}">{{__('nav.Contact Us')}}</a></li>
                        <li><a href="{{route('training-programs.list')}}" wire:navigate>{{__('nav.Training Programs')}}</a></li>
                        @guest
                        <li><a href="{{route('filament.admin.auth.login')}}" wire:navigate>{{__('nav.Login')}}</a></li>
                        <li><a href="{{route('filament.admin.auth.register')}}" wire:navigate>{{__('nav.Register')}}</a></li>
                        @endguest
                        @auth
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative" x-data="{ open: false }">
                            <div>
                                <button @click="open = !open" class="profile-button">
                                    <img class="profile-image" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" />
                                </button>
                            </div>
                            <div x-show="open" @click="open = false" class="menu-container">
                                <div class="menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu">
                                    <a href="{{route('filament.admin.pages.dashboard')}}" class="menu-item" role="menuitem">{{ __('Dashboard') }}</a>
                                    <a href="{{ route('filament.admin.pages.my-profile') }}" class="menu-item" role="menuitem">{{ __('Profile') }}</a>
                                    <a href="" class="menu-item" role="menuitem" wire:click="logout">Log out</a>
                                </div>
                            </div>
                        </div>


                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
        <div class="offcanvas__right">
            <div class="offcanvas__search">
                <form action="#">
                    <input type="text" name="search" placeholder="Search keyword">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="offcanvas__contact">
                <h3>Get in touch</h3>
                <ul>
                    <li><a href="#">+(974) - 123 456 7891</a></li>
                    <li><a href="#">info@arab-pfs.com</a></li>
                    <li>Doha Qatar</li>
                </ul>
            </div>
            <img src="{{asset('assets/imgs/shape/11.png')}}" alt="shape" class="shape-1">
            <img src="{{asset('assets/imgs/shape/12.png')}}" alt="shape" class="shape-2">
        </div>
        <div class="offcanvas__close">
            <button type="button" id="close_offcanvas"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
</div>