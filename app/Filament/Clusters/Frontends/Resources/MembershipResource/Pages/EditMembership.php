<?php

namespace App\Filament\Clusters\Frontends\Resources\MembershipResource\Pages;

use App\Filament\Clusters\Frontends\Resources\MembershipResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditMembership extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = MembershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        $createForm = new CreateMembership();

        return $createForm->form($form);
    }
}
