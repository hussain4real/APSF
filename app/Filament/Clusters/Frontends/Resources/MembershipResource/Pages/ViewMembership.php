<?php

namespace App\Filament\Clusters\Frontends\Resources\MembershipResource\Pages;

use App\Filament\Clusters\Frontends\Resources\MembershipResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewMembership extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = MembershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }
}
