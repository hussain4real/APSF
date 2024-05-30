<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Filament\Clusters\Frontends\Resources\PublicVoteResource\Pages;
use App\Models\PublicVote;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PublicVoteResource extends Resource
{
    use Translatable;

    protected static ?string $model = PublicVote::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrows-up-down';

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
            'index' => Pages\ListPublicVotes::route('/'),
            'create' => Pages\CreatePublicVote::route('/create'),
            'view' => Pages\ViewPublicVote::route('/{record}'),
            'edit' => Pages\EditPublicVote::route('/{record}/edit'),
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
