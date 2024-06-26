<?php

namespace App\Filament\Clusters\Founders\Resources;

use App\Filament\Clusters\Founders;
use App\Filament\Clusters\Founders\Resources\FounderResource\Pages;
use App\Models\Founder;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FounderResource extends Resource
{
    protected static ?string $model = Founder::class;

    protected static ?string $navigationIcon = 'heroicon-o-check-badge';

    protected static ?string $cluster = Founders::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getModelLabel(): string
    {
        return __('founder');
    }

    public static function getPluralModelLabel(): string
    {
        return __('founders');
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::count() > 0) {
            return static::getModel()::count();
        }

        return null;
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
            'index' => Pages\ListFounders::route('/'),
            'create' => Pages\CreateFounder::route('/create'),
            'view' => Pages\ViewFounder::route('/{record}'),
            'edit' => Pages\EditFounder::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
