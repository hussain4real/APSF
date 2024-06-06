<?php

namespace App\Filament\Clusters\Resources\Resources\ScholarshipResource\Pages;

use App\Filament\Clusters\Resources\Resources\ScholarshipResource;
use App\ScholarshipStatus;
use App\ScholarshipType;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateScholarship extends CreateRecord
{
    protected static string $resource = ScholarshipResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')

                    ->maxLength(255),
                Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('institution')
                    ->maxLength(255),
                TextInput::make('program')
                    ->label(__('Program/Course'))
                    ->maxLength(255),
                TextInput::make('country')
                    ->maxLength(255),
                DatePicker::make('start_date')
                    ->native(false)
                    ->placeholder('Select a date')
                    ->prefix('Starts')
                    ->suffix('at midnight')
                    ->live(onBlur: true),
                DatePicker::make('end_date')
                    ->native(false)
                    ->placeholder('Select a date')
                    ->prefix('Ends')
                    ->suffix('at midnight')
                    ->after('start_date'),
                ToggleButtons::make('status')
                    ->translateLabel()
                    ->options(ScholarshipStatus::class)
                    ->default(ScholarshipStatus::UPCOMING)
                    ->inline(),
                ToggleButtons::make('type')
                    ->translateLabel()
                    ->options(ScholarshipType::class)
                    ->default(ScholarshipType::class)
                    ->inline(),
                SpatieMediaLibraryFileUpload::make('attachment')
                    ->collection('scholarship_images')
                    ->hiddenLabel()
                    ->maxFiles(1)
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
                    ->uploadingMessage(__('uploading, please wait...')),
            ]);
    }
}
