<?php

namespace App\Filament\Clusters\Chats\Resources\MessageResource\Pages;

use App\Filament\Clusters\Chats\Resources\MessageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMessage extends EditRecord
{
    protected static string $resource = MessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
