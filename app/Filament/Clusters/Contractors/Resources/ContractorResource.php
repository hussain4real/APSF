<?php

namespace App\Filament\Clusters\Contractors\Resources;

use App\Filament\Clusters\Contractors\Resources\ContractorResource\Pages;
use App\Filament\Clusters\Members;
use App\Models\Contractor;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContractorResource extends Resource
{
    protected static ?string $model = Contractor::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-check';

    protected static ?string $cluster = Members::class;

    protected static ?int $navigationSort = 3;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    //    public static function getNavigationBadge(): ?string
    //    {
    //        if (static::getModel()::count() > 0) {
    //            return static::getModel()::count();
    //        }
    //
    //        return null;
    //    }

    public static function getNavigationLabel(): string
    {
        return __('contractors');
    }

    public static function getModel(): string
    {
        return __('contractor');
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
            'index' => Pages\ListContractors::route('/'),
            'create' => Pages\CreateContractor::route('/create'),
            'view' => Pages\ViewContractor::route('/{record}'),
            'edit' => Pages\EditContractor::route('/{record}/edit'),
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
