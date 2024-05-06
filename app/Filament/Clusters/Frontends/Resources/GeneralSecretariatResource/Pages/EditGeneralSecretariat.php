<?php

namespace App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource\Pages;

use App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditGeneralSecretariat extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = GeneralSecretariatResource::class;

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
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
                TextInput::make('position')
                    ->label(__('Position')),
            ]);
    }
}
