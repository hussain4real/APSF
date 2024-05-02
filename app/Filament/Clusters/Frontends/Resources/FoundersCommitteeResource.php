<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Models\FoundersCommittee;
use Filament\Forms\Form;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FoundersCommitteeResource extends Resource
{
    use Translatable;

    protected static ?string $model = FoundersCommittee::class;

    protected static ?string $navigationIcon = 'heroicon-o-bars-arrow-up';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?int $navigationSort = 3;

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
            'index' => Frontends\Resources\FoundersCommitteeResource\Pages\ListFoundersCommittees::route('/'),
            'create' => Frontends\Resources\FoundersCommitteeResource\Pages\CreateFoundersCommittee::route('/create'),
            'view' => Frontends\Resources\FoundersCommitteeResource\Pages\ViewFoundersCommittee::route('/{record}'),
            'edit' => Frontends\Resources\FoundersCommitteeResource\Pages\EditFoundersCommittee::route('/{record}/edit'),
        ];
    }
}
