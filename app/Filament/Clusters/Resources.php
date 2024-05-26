<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Resources extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function getNavigationLabel(): string
    {
        return __('resources');
    }

    public static function canAccess(): bool
    {
        if (auth()->user()->id === 1 || auth()->user()->id === 8) {
            return true;
        }

        return false;
    }
}
