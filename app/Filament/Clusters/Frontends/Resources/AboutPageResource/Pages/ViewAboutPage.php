<?php

namespace App\Filament\Clusters\Frontends\Resources\AboutPageResource\Pages;

use App\Filament\Clusters\Frontends\Resources\AboutPageResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ViewRecord;

class ViewAboutPage extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }
}
