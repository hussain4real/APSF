<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Members extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-identification';

    //    protected static ?string $navigationGroup = 'Academics';
    public static function getNavigationLabel(): string
    {
        return __('members');
    }

    public static function canAccess(): bool
    {
        if (auth()->user()->id === 1 || auth()->user()->id === 8) {
            return true;
        }

        return false;
    }
}
