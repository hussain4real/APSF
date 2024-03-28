<?php

namespace App\Filament\Clusters\Members\Resources;

use App\Filament\Clusters\Members;
use App\Filament\Clusters\Members\Resources\UserResource\Pages;
use App\Filament\Clusters\Members\Resources\UserResource\RelationManagers;
use App\Models\Scopes\MemberScope;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $cluster = Members::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;



    public static function getModelLabel(): string
    {
        return 'Member';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Members';
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
            // MemberScope::class,
        ])
        ->withGlobalScope('member', new MemberScope);
    }
}
