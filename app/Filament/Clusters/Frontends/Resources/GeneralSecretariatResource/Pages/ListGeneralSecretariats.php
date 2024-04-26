<?php

namespace App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource\Pages;

use App\Filament\Clusters\Frontends\Resources\GeneralSecretariatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGeneralSecretariats extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = GeneralSecretariatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
