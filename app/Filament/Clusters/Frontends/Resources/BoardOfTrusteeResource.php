<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Filament\Clusters\Frontends\Resources\BoardOfTrusteeResource\Pages;
use App\Models\BoardOfTrustee;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBoardOfTrustees::route('/'),
            'create' => Pages\CreateBoardOfTrustee::route('/create'),
            'view' => Pages\ViewBoardOfTrustee::route('/{record}'),
            'edit' => Pages\EditBoardOfTrustee::route('/{record}/edit'),
        ];
    }
}
