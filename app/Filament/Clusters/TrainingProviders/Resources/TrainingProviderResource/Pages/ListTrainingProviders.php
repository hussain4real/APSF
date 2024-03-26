<?php

namespace App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource\Pages;

use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrainingProviders extends ListRecords
{
    protected static string $resource = TrainingProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
