<?php

namespace App\Filament\Clusters\Frontends\Resources\HomepageResource\Pages;

use App\Filament\Clusters\Frontends\Resources\HomepageResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditHomepage extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = HomepageResource::class;

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
        $createForm = new CreateHomepage();

        return $createForm->form($form);
    }
}
