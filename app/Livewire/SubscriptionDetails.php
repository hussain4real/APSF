<?php

namespace App\Livewire;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use Livewire\Component;

class SubscriptionDetails extends MyProfileComponent
{

    public array $data;

    public Collection $transactions;
    // public $checkout;


    public function mount()
    {
        $user = auth()->user();
        $this->transactions = $user->transactions;
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('first_name')
                ->label('First Name')
                ->placeholder('Enter your first name')
                ->required(),
        ])
            ->statePath('data');
    }

    // public function subscribe(Request $request)
    // {
    //     $checkout = $request->user()->checkout(['pri_01hsb68jw5jmjbms2xbmr5ba9s'])
    //         ->returnTo(route('welcome'));

    //     return view('subscribe', ['checkout' => $checkout]);
    // }

    public function subscribe()
    {
        redirect()->route('subscribe');
    }

    public function render()
    {
        return view('livewire.subscription-details-component', [
            'transactions' => $this->transactions,
            // 'checkout' => $this->checkout,
        
        ]);
    }
}
