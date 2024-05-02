<?php

namespace App\Filament\Clusters;

use Filament\Clusters\Cluster;

class Students extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function getNavigationLabel(): string
    {
        return __('students');
    }
}
