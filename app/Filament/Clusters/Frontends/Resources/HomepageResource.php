<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Filament\Clusters\Frontends\Resources\HomepageResource\Pages;
use App\Models\Homepage;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HomepageResource extends Resource
{
    use Translatable;

    protected static ?string $model = Homepage::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hero_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hero_subtitle')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mission_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vision_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('values_heading')
                    ->searchable(),
                Tables\Columns\TextColumn::make('chairman_message_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('partners_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('member_action_text')
                    ->searchable(),
                Tables\Columns\TextColumn::make('member_action_url')
                    ->searchable(),
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
            'index' => Pages\ListHomepages::route('/'),
            'create' => Pages\CreateHomepage::route('/create'),
            'view' => Pages\ViewHomepage::route('/{record}'),
            'edit' => Pages\EditHomepage::route('/{record}/edit'),
        ];
    }
}
