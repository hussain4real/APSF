<?php

// namespace App\Filament\Pages;

// use App\Models\ChMessage;
// use Chatify\Facades\ChatifyMessenger;
// use Filament\Pages\Page;
// use Illuminate\Support\Facades\Auth;

// class Chat extends Page
// {
//     protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';

//     protected static string $view = 'filament.pages.chat';

//     public string $id;
//     public string $messengerColor;

//     public string $dark_mode;

//     public static function getNavigationBadge(): ?string
//     {
//         $messages = ChMessage::where('to_id', Auth::id())->where('seen', false)->count();
//         return $messages > 0 ? $messages : null;
//     }

//     public static function getNavigationBadgeTooltip(): ?string
//     {
//         $messages = ChMessage::where('to_id', Auth::id())->where('seen', false)->count();
//         return "You have {$messages} unread messages";
//     }

//     public function mount()
//     {
//         $this->id = Auth::id();
//         $this->messengerColor = Auth::user()->messenger_color ? Auth::user()->messenger_color : ChatifyMessenger::getFallbackColor();
//         $this->dark_mode = Auth::user()->dark_mode < 1 ? 'light' : 'dark';
//     }
// }
