<?php

namespace App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource;
use Filament\Actions;
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
                    ->label(__('Country'))
                    ->required(),
                TextInput::make('name')
                    ->label(__('Name'))
                    ->required(),
            ]);
    }
}
