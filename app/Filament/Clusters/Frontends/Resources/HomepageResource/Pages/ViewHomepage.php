<?php

namespace App\Filament\Clusters\Frontends\Resources\HomepageResource\Pages;

use App\Filament\Clusters\Frontends\Resources\HomepageResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewHomepage extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = HomepageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }
}
