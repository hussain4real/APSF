<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Filament\Clusters\Frontends\Resources\AboutPageResource\Pages;
use App\Models\AboutPage;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AboutPageResource extends Resource
{
    use Translatable;

    protected static ?string $model = AboutPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?int $navigationSort = 2;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_subtitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_heading')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_one')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_two')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_three')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_four')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_five')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_six')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_seven')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_eight')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_nine')
                    ->searchable(),
                Tables\Columns\TextColumn::make('objective_title_ten')
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
            'index' => Pages\ListAboutPages::route('/'),
            'create' => Pages\CreateAboutPage::route('/create'),
            'view' => Pages\ViewAboutPage::route('/{record}'),
            'edit' => Pages\EditAboutPage::route('/{record}/edit'),
        ];
    }
}
