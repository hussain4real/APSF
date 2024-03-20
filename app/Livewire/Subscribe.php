<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Subscribe extends Component
{

    #[Layout('layouts.app')] 
    public function render()
    {
        auth()->user()->load('subscriptions');
        if(auth()->user()->subscribed()){
            session()->flash('success', 'Your account has been subscribed');
        }
        return view('livewire.subscribe');
    }
}
