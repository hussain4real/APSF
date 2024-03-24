<?php

namespace App\Filament\Clusters\Contractors\Resources\ContractorResource\Pages;

use App\Filament\Clusters\Contractors\Resources\ContractorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListContractors extends ListRecords
{
    protected static string $resource = ContractorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
