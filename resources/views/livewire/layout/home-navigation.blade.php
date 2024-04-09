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
                <li><a href="{{route('welcome')}}" wire:navigate>Home</a></li>
                <li><a href="{{route('about')}}" wire:navigate>About Us</a></li>
                <li><a href="#">Committee</a>
                    <ul class="main-dropdown">
                        <li><a href="{{route('founders-committee')}}" wire:navigate>Founders Committee</a></li>
                        <li><a href="{{route('board-of-trustees')}}" wire:navigate>Board of Trustees</a></li>
                        <li><a href="{{route('general-secretariat')}}" wire:navigate>General Secretariat</a></li>
                    </ul>
                </li>
                <li><a href="{{route('services')}}" wire:navigate>Services</a>
                    <!-- <ul class="main-dropdown">
              <li><a href="#">Academic Support</a></li>
              <li><a href="#">Professional Development</a></li>
              <li><a href="#">Student Support</a></li>
              <li><a href="#">Advocacy & Representation</a></li>
              <li><a href="#">Programs & Initiatives</a></li>
              <li><a href="#">Membership</a></li>
            </ul> -->
                </li>
                <li><a href="{{route('events')}}" wire:navigate>Events</a></li>
                <li><a href="{{route('contact')}}">Contact Us</a></li>
                <li><i class="fa-solid fa-user"></i> Login</li>
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
</nav>
