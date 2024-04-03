<?php

namespace App\Filament\Clusters\Chats\Resources\ChatResource\Pages;

use App\Filament\Clusters\Chats\Resources\ChatResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewChat extends ViewRecord
{
    protected static string $resource = ChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
