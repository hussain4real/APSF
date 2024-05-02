<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Teachers extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    public static function getNavigationLabel(): string
    {
        return __('teachers');
    }
}
