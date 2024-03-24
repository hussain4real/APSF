<?php

namespace App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource\Pages;

use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrainingProvider extends EditRecord
{
    protected static string $resource = TrainingProviderResource::class;

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
