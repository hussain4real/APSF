<?php

namespace App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource;
use Filament\Actions\LocaleSwitcher;
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
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
            ]);
    }
}
