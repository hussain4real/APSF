<?php

namespace App\Filament\Clusters\Founders\Resources\FounderResource\Pages;

use App\Filament\Clusters\Founders\Resources\FounderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFounder extends EditRecord
{
    protected static string $resource = FounderResource::class;

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
