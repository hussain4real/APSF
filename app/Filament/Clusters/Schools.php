<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Schools extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function getNavigationLabel(): string
    {
        return __('schools');
    }
}
