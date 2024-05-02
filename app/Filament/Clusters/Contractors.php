<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Contractors extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    public static function getNavigationLabel(): string
    {
        return __('contractors');
    }
}
