<?php

namespace App\Filament\Clusters\Resources\Resources\ScholarshipResource\Pages;

use App\Filament\Clusters\Resources\Resources\ScholarshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewScholarship extends ViewRecord
{
    protected static string $resource = ScholarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
