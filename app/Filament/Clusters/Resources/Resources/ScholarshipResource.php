<?php

namespace App\Filament\Clusters\Resources\Resources;

use App\Filament\Clusters\Resources;
use App\Filament\Clusters\Resources\Resources\ScholarshipResource\Pages;
use App\Models\Scholarship;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;

class ScholarshipResource extends Resource
{
    protected static ?string $model = Scholarship::class;

    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';

    protected static ?string $cluster = Resources::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListScholarships::route('/'),
            'create' => Pages\CreateScholarship::route('/create'),
            'view' => Pages\ViewScholarship::route('/{record}'),
            'edit' => Pages\EditScholarship::route('/{record}/edit'),
        ];
    }
}
