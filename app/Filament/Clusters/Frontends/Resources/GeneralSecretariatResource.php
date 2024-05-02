<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Models\GeneralSecretariat;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;

class GeneralSecretariatResource extends Resource
{
    use Translatable;

    protected static ?string $model = GeneralSecretariat::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?int $navigationSort = 5;

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Frontends\Resources\GeneralSecretariatResource\Pages\ListGeneralSecretariats::route('/'),
            'create' => Frontends\Resources\GeneralSecretariatResource\Pages\CreateGeneralSecretariat::route('/create'),
            'view' => Frontends\Resources\GeneralSecretariatResource\Pages\ViewGeneralSecretariat::route('/{record}'),
            'edit' => Frontends\Resources\GeneralSecretariatResource\Pages\EditGeneralSecretariat::route('/{record}/edit'),
        ];
    }
}
