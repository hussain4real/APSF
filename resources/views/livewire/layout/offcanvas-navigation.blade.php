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

<div class="offcanvas__area">
    <div class="offcanvas__body">
        <div class="offcanvas__left">
            <div class="offcanvas__logo">
                <a href="/" wire:navigate><img src="{{asset('assets/imgs/apsf/logo/apsflogo_271x69_white.webp')}}"
                        alt="Offcanvas Logo"></a>
            </div>
            <div class="offcanvas__social">
                <h3 class="social-title">Follow Us</h3>
                <ul>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">YouTube</a></li>
                    <li><a href="#">LinkedIn</a></li>
                </ul>
            </div>
            <div class="offcanvas__links">
                <ul>
                    <li><a href="{{route('about')}}" wire:navigate>About APSF</a></li>
                    <li><a href="{{route('contact')}}" wire:navigate>{{__('nav.Contact Us')}}</a></li>
{{--                    <li><a href="career.html" wire:navigate>Career</a></li>--}}
{{--                    <li><a href="faq.html" wire:navigate>FAQs</a></li>--}}
                </ul>
            </div>
        </div>
        <div class="offcanvas__mid">
            <div class="offcanvas__menu-wrapper">
                <nav class="offcanvas__menu">
                    <ul class="menu-anim">
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
{{--                        <li><a href="{{route('events')}}" wire:navigate>{{__('nav.Events')}}</a></li>--}}
                        <li><a href="{{route('contact')}}">{{__('nav.Contact Us')}}</a></li>
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
