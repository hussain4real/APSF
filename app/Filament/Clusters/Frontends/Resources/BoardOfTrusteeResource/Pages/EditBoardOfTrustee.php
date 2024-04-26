<?php

namespace App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource;
use Filament\Actions;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditBoardOfTrustee extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = BoardOfTrusteeResource::class;

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
            ]);
    }
}
