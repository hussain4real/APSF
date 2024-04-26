<?php

namespace App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource\Pages;

use App\Filament\Clusters\Frontends\Resources\FoundersCommitteeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFoundersCommittee extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = FoundersCommitteeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }
}
