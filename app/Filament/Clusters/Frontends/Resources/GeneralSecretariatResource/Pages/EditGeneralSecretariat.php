<?php

namespace App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource\Pages;

use App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource;
use Filament\Actions;
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
        $createForm = new CreateGeneralSecretariat();

        return $createForm->form($form);
    }
}
