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
}
