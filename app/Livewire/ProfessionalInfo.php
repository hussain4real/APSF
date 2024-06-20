<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;
use Livewire\Component;

class ProfessionalInfo extends MyProfileComponent
{
    use InteractsWithForms;

    public array $only = [
        'first_name', 
        'last_name', 
        'email', 
        'profile_photo'
    ];
    public $user;
    public $userClass;
    public ?array $data = [];

    public function mount():void
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();

        $this->userClass = get_class($this->user);

        $this->form->fill($this->user->only($this->only));
    }


    public function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('trainingProviderid')
                ->label('First Name')
                ->required(),
        ])
        ->statePath('data');
    }

    public function render()
    {
        return view('livewire.professional-info');
    }
}
