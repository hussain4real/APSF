<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Livefeed extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-path-rounded-square';

    protected static string $view = 'filament.pages.livefeed';

    public static function getNavigationLabel(): string
    {
        return __('livefeeds');
    }
}
