<?php

namespace App\Filament\Clusters\Chats\Resources\ChatResource\Pages;

use App\Filament\Clusters\Chats\Resources\ChatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditChat extends EditRecord
{
    protected static string $resource = ChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
