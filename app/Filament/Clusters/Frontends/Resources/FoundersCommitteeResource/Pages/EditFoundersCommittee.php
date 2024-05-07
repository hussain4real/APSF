<?php

namespace App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource;
use Filament\Actions;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditFoundersCommittee extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = FoundersCommitteeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('country')
                    ->label(__('Country')),
                TextInput::make('name')
                    ->label(__('Name')),
                TextInput::make('url')
                    ->label(__('Link'))
                    ->url(),
                SpatieMediaLibraryFileUpload::make('attachment')
                    ->collection('founders_committee_images')
                    ->hiddenLabel()
                    ->responsiveImages()
                    ->maxSize(1024 * 3)
                    ->hint(__('Maximum size: 3MB.'))
                    ->hintIcon('heroicon-o-information-circle')
                    ->hintColor('warning')
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
