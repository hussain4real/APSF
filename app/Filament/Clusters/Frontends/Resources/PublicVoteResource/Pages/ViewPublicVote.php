<?php

namespace App\Filament\Clusters\Frontends\Resources\PublicVoteResource\Pages;

use App\Filament\Clusters\Frontends\Resources\PublicVoteResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewPublicVote extends ViewRecord
{
    use ViewRecord\Concerns\Translatable;

    protected static string $resource = PublicVoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }
}
