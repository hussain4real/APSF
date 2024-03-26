<?php

namespace App\Filament\Clusters\Founders\Resources\FounderResource\Pages;

use App\Filament\Clusters\Founders\Resources\FounderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFounders extends ListRecords
{
    protected static string $resource = FounderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
