<?php

namespace App\Filament\Clusters\Chats\Resources\ChatResource\Pages;

use App\Filament\Clusters\Chats\Resources\ChatResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListChats extends ListRecords
{
    protected static string $resource = ChatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
