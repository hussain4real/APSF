<?php

namespace App\Filament\Clusters\Users\Resources;

use App\Filament\Clusters\Members;
use App\Filament\Clusters\Users\Resources\UserResource\Pages;
use App\Models\Scopes\MemberScope;
use App\Models\User;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $cluster = Members::class;

    protected static ?int $navigationSort = 1;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getPluralModelLabel(): string
    {
        return 'Users';
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
                //                MemberScope::class,
            ]);
        //            ->withGlobalScope('member', new MemberScope);
    }
}
