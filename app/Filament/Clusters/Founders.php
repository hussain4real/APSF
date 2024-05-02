<?php

namespace App\Filament\Clusters;

use App\Models\Founder;
use Filament\Clusters\Cluster;

class Founders extends Cluster
{
    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    //    public static function getNavigationBadge(): ?string
    //    {
    //        return Founder::count();
    //    }

    public static function getNavigationLabel(): string
    {
        return __('founders');
    }
}
