<?php

namespace App\Filament\Clusters\Resources\Resources\ScholarshipResource\Pages;

use App\Filament\Clusters\Resources\Resources\ScholarshipResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditScholarship extends EditRecord
{
    protected static string $resource = ScholarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        $createScholarship = new CreateScholarship();

        return $createScholarship->form($form);
    }
}
