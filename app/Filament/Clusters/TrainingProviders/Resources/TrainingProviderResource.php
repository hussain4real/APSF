<?php

namespace App\Filament\Clusters\TrainingProviders\Resources;

use App\Filament\Clusters\Members;
use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource\Pages;
use App\Models\TrainingProvider;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrainingProviderResource extends Resource
{
    protected static ?string $model = TrainingProvider::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';

    protected static ?string $cluster = Members::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getNavigationGroup(): ?string
    {
        return 'Academics';
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::count() > 0) {
            return static::getModel()::count();
        }

        return null;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('institution_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution_address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution_website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution_logo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('institution_description')
                    ->searchable(),
                Tables\Columns\TextColumn::make('license')
                    ->searchable(),
                Tables\Columns\TextColumn::make('license_expiry_date')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListTrainingProviders::route('/'),
            'create' => Pages\CreateTrainingProvider::route('/create'),
            'view' => Pages\ViewTrainingProvider::route('/{record}'),
            'edit' => Pages\EditTrainingProvider::route('/{record}/edit'),
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
