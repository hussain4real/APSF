<?php

namespace App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;

use App\Filament\Clusters\Resources\Resources\TrainingProgramResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainingPrograms extends ListRecords
{
    protected static string $resource = TrainingProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
