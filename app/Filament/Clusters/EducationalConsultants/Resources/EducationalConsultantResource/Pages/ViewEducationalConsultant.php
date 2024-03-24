<?php

namespace App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource\Pages;

use App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewEducationalConsultant extends ViewRecord
{
    protected static string $resource = EducationalConsultantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
