<?php

namespace App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateFoundersCommittee extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = FoundersCommitteeResource::class;

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
                TextInput::make('country')
                    ->label(__('Country'))
                    ->required(),
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
            ]);
    }
}
