<?php

namespace App\Filament\Clusters\Chats\Resources\MessageResource\Pages;

use App\Filament\Clusters\Chats\Resources\MessageResource;
use App\Jobs\SendMessage;
use Filament\Resources\Pages\CreateRecord;
use Livewire\Attributes\On;

class CreateMessage extends CreateRecord
{
    protected static string $resource = MessageResource::class;

    public function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function beforeCreate()
    {
        $message = $this->data;
        SendMessage::dispatch($message);
    }

    #[On('echo:chat-channel,MessageEvent')]
    public function listenForMessageEvent($event)
    {
        dd($event);

    }
}
