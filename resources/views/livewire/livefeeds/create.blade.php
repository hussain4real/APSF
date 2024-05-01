<?php

use Filament\Forms\Get;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Components\FileUpload;
use App\Models\Livefeed;

new class extends Component implements HasForms {
    use InteractsWithForms;

    // #[\Livewire\Attributes\Validate('string|max:255')]
    // public string $message = '';
    // #[\Livewire\Attributes\Validate('nullable|image|max:1024')]
    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
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
                ->live(onBlur: true)
                ,
                \Filament\Forms\Components\Placeholder::make('character_count')
                    ->content(function (Get $get){
                        $message = $get('message');
                        $count = strlen($message);
                        $remaining = 500 - $count;
                        return "Characters remaining: $remaining";
                    })
                ->hiddenLabel(),
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
            ->model(Livefeed::class);
    }

    public function store(): void
    {

        if (auth()->check()) {
            $data = $this->form->getState();
            // auth()->user()->livefeeds()->create($this->form->getState());
            $record = Livefeed::create($data);

            $this->form->model($record)->saveRelationships();

            $this->form->fill();

            $this->dispatch('livefeed-created');

            \Filament\Notifications\Notification::make('Livefeed created successfully!')
                ->success()
                ->title('Success')
                ->body('The livefeed has been posted successfully.')
                ->send();
        }

    }
}; ?>

<div class="mt-24">
    <form wire:submit="store">
        {{-- <textarea wire:model="message" placeholder="{{ __('What\'s on your mind?') }}"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea> --}}
        {{-- <x-forms.filepond wire:model="image" allowImagePreview imagePreviewMaxHeight="200" /> --}}
        {{ $this->form }}

        <x-input-error :messages="$errors->get('message')" class="mt-2"/>
        <x-primary-button class="mt-4 bg-primary-700 hover:bg-primary-500">{{ __('Post') }}</x-primary-button>
    </form>
    <livewire:livefeeds.list/>

</div>
@push('styles')
    @once
        <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
              rel="stylesheet">
    @endonce
@endpush

@push('scripts')
    @once
        <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
        <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);
        </script>
    @endonce
@endpush
