<?php

namespace App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;

use App\Filament\Clusters\Resources\Resources\TrainingProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTrainingProgram extends ViewRecord
{
    protected static string $resource = TrainingProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
