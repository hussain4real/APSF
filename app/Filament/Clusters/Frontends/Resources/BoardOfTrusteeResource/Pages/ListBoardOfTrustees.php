<?php

namespace App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBoardOfTrustees extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = BoardOfTrusteeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
