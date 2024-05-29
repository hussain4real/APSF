<?php

namespace App\Filament\Clusters\Frontends\Resources\PublicVoteResource\Pages;

use App\Filament\Clusters\Frontends\Resources\PublicVoteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPublicVote extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = PublicVoteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
