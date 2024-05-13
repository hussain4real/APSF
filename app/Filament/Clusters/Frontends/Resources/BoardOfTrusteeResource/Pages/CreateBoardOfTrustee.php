<?php

namespace App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateBoardOfTrustee extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = BoardOfTrusteeResource::class;

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
                TextInput::make('order')
                    ->label(__('Order'))
                    ->numeric()
                    ->required(),
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                SpatieMediaLibraryFileUpload::make('attachment')
                    ->collection('board_of_trustees_images')
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
