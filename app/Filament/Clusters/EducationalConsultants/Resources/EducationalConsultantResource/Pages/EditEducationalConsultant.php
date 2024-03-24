<?php

namespace App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource\Pages;

use App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEducationalConsultant extends EditRecord
{
    protected static string $resource = EducationalConsultantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
