<?php

namespace App\Livewire;

use Filament\Notifications\Notification;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Subscribe extends Component
{

    #[Layout('layouts.app')] 
    public function render()
    {
        auth()->user()->load('subscriptions');
        if(auth()->user()->subscribed()){
            // Notification::make('subscribed')
            // ->success()
            // ->title('You are now subscribed!')
            // ->body('You are now subscribed to our service. Thank you for your support!')
            // ->send();
            session()->flash('success', 'You are now subscribed!');
            $this->redirect(route('filament.admin.pages.my-profile'));
        }
        return view('livewire.subscribe');
    }
}
