<?php

namespace App\Filament\Clusters\Frontends\Resources\AboutPageResource\Pages;

use App\Filament\Clusters\Frontends\Resources\AboutPageResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditAboutPage extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        $createForm = new CreateAboutPage();

        return $createForm->form($form);
    }
}
