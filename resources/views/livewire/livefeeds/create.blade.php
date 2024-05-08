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
                    ->extraAttributes([
                       'class'=>'livefeed'
                    ])
//                ->autosize()
                    ->autofocus()
                    ->maxLength(length: 500)
                    ->hiddenLabel()
                ->live(debounce: 500)
                ,
                \Filament\Forms\Components\Placeholder::make('character_count')
                    ->content(function (Get $get){
                        $message = $get('message');
                        $count = strlen($message);
                        $remaining = 500 - $count;
                        //use a progress bar to show the remaining characters and change to red if remaining characters is less than 20
                        return new \Illuminate\Support\HtmlString('
                      <div class="relative pt-1" id="progress-bar">
                            <div class="flex mb-2 items-center justify-end">

                                <div class="text-right text-xs">
                                    <span class="text-xs font-semibold inline-block text-primary-600" id="character-count">
                                        '.$count.'/500
                                    </span>
                                </div>
                            </div>
                            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                                <div style="width:'.($count/500)*100 .'%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-warning-600"></div>
                            </div>
                        </div>

                        ');

                    })
//                    ->content(function (Get $get){
//                        $message = $get('message');
//                        $count = strlen($message);
//                        $remaining = 500 - $count;
//                        return "Characters remaining: $remaining";
//                    })
//                    ->extraAttributes(function(Get $get){
//                        $message = $get('message');
//                        $count = strlen($message);
//                        $remaining = 500 - $count;
//                        return [
//                            'class' =>  $remaining < 10 ? 'text-red-500 character-count' : 'text-gray-500 character-count',
//
//                        ];
//                    })
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
{{--<script>--}}
{{--    document.addEventListener('DOMContentLoaded', function () {--}}
{{--    let textarea = document.querySelector('.livefeed');--}}
{{--    let characterCount = document.getElementById('character-count');--}}
{{--    let progressBar = document.querySelector('#progress-bar .shadow-none');--}}

{{--    if (!textarea) {--}}
{{--        console.error("Textarea element with class 'livefeed' not found.");--}}
{{--        return;--}}
{{--    }--}}

{{--    textarea.addEventListener('input', function () {--}}
{{--        let message = textarea.value;--}}
{{--        if (typeof message !== 'string') {--}}
{{--            message = '';--}}
{{--            console.error('message is not a string:', message);--}}
{{--        }--}}

{{--        let count = message.length;--}}
{{--        let remaining = 500 - count;--}}

{{--        characterCount.textContent = count + '/500';--}}
{{--        progressBar.style.width = (count / 500) * 100 + '%';--}}

{{--        if (remaining < 20) {--}}
{{--            if (!progressBar.classList.contains('bg-red-500')) {--}}
{{--                progressBar.classList.remove('bg-warning-600', 'bg-blue-600');--}}
{{--                progressBar.classList.add('bg-red-500');--}}
{{--            }--}}
{{--        } else if (remaining < 50) {--}}
{{--            if (!progressBar.classList.contains('bg-warning-600')) {--}}
{{--                progressBar.classList.remove('bg-red-500', 'bg-blue-600');--}}
{{--                progressBar.classList.add('bg-warning-600');--}}
{{--            }--}}
{{--        } else {--}}
{{--            if (!progressBar.classList.contains('bg-blue-600')) {--}}
{{--                progressBar.classList.remove('bg-red-500', 'bg-warning-600');--}}
{{--                progressBar.classList.add('bg-blue-600');--}}
{{--            }--}}
{{--        }--}}
{{--    });--}}
{{--});--}}
{{--</script>--}}
