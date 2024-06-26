<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class TrainingProviders extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    public static function getNavigationLabel(): string
    {
        return __('training providers');
    }
}
