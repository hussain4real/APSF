<?php

namespace App\Filament\Clusters\Frontends\Resources\EventResource\Pages;

use App\Filament\Clusters\Frontends\Resources\EventResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = EventResource::class;

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
        $createForm = new CreateEvent();

        return $createForm->form($form);
    }
}
