<?php

//
//namespace App\Filament\Clusters\Members\Resources;
//
//use App\Filament\Clusters\Members;
//use App\Filament\Clusters\Members\Resources\MemberResource\Pages;
//use App\Models\Member;
//use Filament\Pages\SubNavigationPosition;
//use Filament\Resources\Resource;
//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletingScope;
//
//class MemberResource extends Resource
//{
//    protected static ?string $model = Member::class;
//
//    protected static ?string $navigationIcon = 'heroicon-o-identification';
//
//    protected static ?string $cluster = Members::class;
//
//    protected static ?int $navigationSort = 2;
//
//    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;
//
//    public static function getNavigationBadge(): ?string
//    {
//        if (static::getModel()::count() > 0) {
//            return static::getModel()::count();
//        }
//
//        return null;
//    }
//
//    public static function getRelations(): array
//    {
//        return [
//            //
//        ];
//    }
//
//    public static function getPages(): array
//    {
//        return [
//            'index' => Pages\ListMembers::route('/'),
//            'create' => Pages\CreateMember::route('/create'),
//            'view' => Pages\ViewMember::route('/{record}'),
//            'edit' => Pages\EditMember::route('/{record}/edit'),
//        ];
//    }
//
//    public static function getEloquentQuery(): Builder
//    {
//        return parent::getEloquentQuery()
//            ->withoutGlobalScopes([
//                SoftDeletingScope::class,
//            ]);
//    }
//}
