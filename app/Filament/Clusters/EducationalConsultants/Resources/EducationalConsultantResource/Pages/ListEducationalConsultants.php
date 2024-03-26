<?php

namespace App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource\Pages;

use App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEducationalConsultants extends ListRecords
{
    protected static string $resource = EducationalConsultantResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
