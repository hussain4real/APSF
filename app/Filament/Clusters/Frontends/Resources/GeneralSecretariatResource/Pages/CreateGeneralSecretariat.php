<?php

namespace App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource\Pages;

use App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateGeneralSecretariat extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = GeneralSecretariatResource::class;

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
                TextInput::make('seo_title')
                    ->label(__('SEO Title')),
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('position')
                    ->label(__('Position')),
                Textarea::make('description')
                    ->label(__('Description')),
            ]);
    }
}
