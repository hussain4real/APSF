<?php

namespace App\Livewire;

use Filament\Facades\Filament;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Illuminate\Support\Number;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;
use Jeffgreco13\FilamentBreezy\Livewire\PersonalInfo;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CustomPersonalInfo extends MyProfileComponent
{
    protected string $view = "livewire.personal-info";
    public array $only = ['first_name', 'last_name', 'email', 'profile_photo'];
    public array $data;
    public $user;
    public $userClass;


    // this example shows an additional field we want to capture and save on the user
    public function mount()
    {
        $this->user = Filament::getCurrentPanel()->auth()->user();
        $this->userClass = get_class($this->user);

        $this->form->fill($this->user->only($this->only));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('first_name')
                    ->label('First Name')
                    ->required(),
                TextInput::make('last_name')
                    ->label('Last Name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email')
                    ->required(),
                    SpatieMediaLibraryFileUpload::make('profile_photo')
                    ->label(__('Profile Photo'))
                    ->collection('profile_photo')
                    ->image()
                    ->avatar()
                    ->imageEditor()
                    ->circleCropper()
                    ->moveFiles()
                    ->uploadingMessage('Uploading avatar...')
                    ->maxSize(5024)
                    ->getUploadedFileNameForStorageUsing(
                        fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                            ->prepend(auth()->user()->name . '/profile_photo/'),
                    )
                    ->hint(__('Maximum size: ' . Number::fileSize(1024 * 1000 * 5) . ' bytes.'))
                    ->hintIcon('heroicon-o-information-circle')
                    ->hintColor('warning'),

            ])
            ->columns(2)
            ->statePath('data');
    }

    public function submit(): void
    {
        $data = collect($this->form->getState())->only($this->only)->all();
        $this->user->update($data);
        Notification::make()
            ->success()
            ->title(__('Profile Updated Successfully'))
            ->send();
    }

    public function render()
    {
        return view('livewire.personal-info');
    }
}
