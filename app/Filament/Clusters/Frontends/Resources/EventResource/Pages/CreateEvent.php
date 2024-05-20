<?php

namespace App\Filament\Clusters\Frontends\Resources\EventResource\Pages;

use App\EventType;
use App\Filament\Clusters\Frontends\Resources\EventResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

class CreateEvent extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('event_title')
                    ->label(__('Event Name'))
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        if (($get('event_slug') ?? '') !== Str::slug($old)) {
                            return;
                        }
                        $set('event_slug', Str::slug($state));
                    })
                    ->required(),
                TextInput::make('event_slug')
                    ->label(__('Event Slug'))
                    ->required(),
                Textarea::make('event_description')
                    ->label(__('Event Description'))
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set, ?string $old, ?string $state) {
                        //                        if (($get('event_excerpt') ?? '') !== Str::limit($old, 100)) {
                        //                            return;
                        //                        }
                        $set('event_excerpt', Str::limit($state, 100));
                    }),
                TextInput::make('event_excerpt')
                    ->label(__('Event Excerpt')),
                Select::make('type')
                    ->label(__('Event Type'))
                    ->options(EventType::class)
                    ->default(EventType::NEWS)
                    ->live(onBlur: true),
                DateTimePicker::make('event_start_date')
                    ->label(__('Event Date'))
                    ->native(false)
                    ->format('Y-m-d H:i:s')
                    ->placeholder('Select a date and time')
                    ->date(true),
                DateTimePicker::make('event_end_date')
                    ->label(__('Event End Date'))
                    ->visible(function (Get $get) {
                        return $get('type') !== EventType::NEWS;
                    })
                    ->native(false)
                    ->seconds(false)
                    ->format('Y-m-d H:i:s')
                    ->placeholder('Select a date and time')
                    ->time(true),
                TextInput::make('event_location')
                    ->label(__('Event Location')),
                SpatieMediaLibraryFileUpload::make('attachment')
                    ->collection('events_media')
                    ->multiple()
                    ->hiddenLabel()
                    ->responsiveImages()
                    ->maxSize(1024 * 1000)
                    ->maxFiles(4)
                    ->hint(__('Maximum size: '.Number::fileSize(1024 * 1000 * 1000).' bytes.'))
                    ->hintIcon('heroicon-o-information-circle')
                    ->hintColor('warning')
                    ->imagePreviewHeight('250')
                    ->openable()
                    ->reorderable()
                    ->appendFiles()
                    ->moveFiles()
                    ->preserveFilenames()
                    ->downloadable()
                    ->imageEditor(2)
                    ->imageEditorEmptyFillColor('#dda581')
                    ->uploadingMessage(__('uploading, please wait...')),

            ]);
    }
}
