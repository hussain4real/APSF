<?php

use App\Models\Livefeed;
use Filament\Forms\Form;
use Livewire\Volt\Component;

new class extends Component implements \Filament\Forms\Contracts\HasForms {

    use \Filament\Forms\Concerns\InteractsWithForms;

    public \App\Models\Livefeed $livefeed;

//    #[\Livewire\Attributes\Validate('required|string|max:255')]
//    public string $message = '';

    public ?array $data = [];

    public function mount(): void
    {
//        $this->message = $this->livefeed->message;
        $this->form->fill($this->livefeed->toArray());
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Filament\Forms\Components\Hidden::make('user_id')
                    ->disabled()
                    ->dehydrated()
                    ->default(auth()?->user()?->id ?? null),
                Filament\Forms\Components\Textarea::make('message')
                    ->placeholder(__('What\'s on your mind?'))
                    ->rows(10)
//                ->autosize()
                    ->autofocus()
                    ->maxLength(length: 500)
                    ->hiddenLabel()
                    ->live(debounce: 500)
                ,
                Filament\Forms\Components\SpatieMediaLibraryFileUpload::make('attachment')
                    ->collection('livefeed_images')
                    ->hiddenLabel()
                    ->responsiveImages()
                    ->multiple()
                    ->maxFiles(4)
                    ->maxSize(1024 * 3)
                    ->hint(__('Maximum size: 3MB.'))
                    ->hintIcon('heroicon-o-information-circle')
                    ->hintColor('warning')
                    ->hintIconTooltip(__('Supported formats: png, jpg, jpeg, gif, svg, pdf'))
                    ->reorderable()
                    ->appendFiles()
                    ->panelLayout('grid')
                    ->imagePreviewHeight('150')
                    ->openable()
                    ->preserveFilenames()
                    ->downloadable()
                    ->imageEditor(2)
                    ->imageEditorEmptyFillColor('#dda581')
                    ->uploadingMessage(__('uploading, please wait...'))
            ])
            ->statePath('data')
            ->model($this->livefeed);
    }


    public function update(): void
    {
//        $this->authorize('update', $this->livefeed);
//
//        $validated = $this->validate();
//
//        $this->livefeed->update($validated);
        if (auth()->check()) {
            $data = $this->form->getState();
            // auth()->user()->livefeeds()->create($this->form->getState());
            $this->livefeed->update($data);



//            $this->form->model($record)->saveRelationships();

            $this->dispatch('livefeed-updated');
        }

    }

    public function cancel(): void
    {
        $this->dispatch('livefeed-edit-canceled');
    }
}; ?>

<div>
    <form wire:submit="update">
        {{--        <textarea--}}
        {{--            wire:model="message"--}}
        {{--            rows="8"--}}
        {{--            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"--}}
        {{--        ></textarea>--}}

        {{ $this->form }}

        <x-input-error :messages="$errors->get('message')" class="mt-2"/>
        <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
        <button class="mt-4" wire:click.prevent="cancel">Cancel</button>
    </form>
</div>
