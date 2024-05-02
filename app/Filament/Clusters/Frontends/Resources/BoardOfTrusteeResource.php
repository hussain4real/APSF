<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource\Pages;
use App\Models\BoardOfTrustee;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;

class BoardOfTrusteeResource extends Resource
{
    use Translatable;

    protected static ?string $model = BoardOfTrustee::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Frontends\Resources\BoardOfTrusteeResource\Pages\ListBoardOfTrustees::route('/'),
            'create' => Frontends\Resources\BoardOfTrusteeResource\Pages\CreateBoardOfTrustee::route('/create'),
            'view' => Frontends\Resources\BoardOfTrusteeResource\Pages\ViewBoardOfTrustee::route('/{record}'),
            'edit' => Pages\EditBoardOfTrustee::route('/{record}/edit'),
        ];
    }
}
