<?php

namespace App\Filament\Clusters\Frontends\Resources\EventResource\Pages;

use App\Filament\Clusters\Frontends\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
