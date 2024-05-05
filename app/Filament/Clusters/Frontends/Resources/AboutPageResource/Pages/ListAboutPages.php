<?php

namespace App\Filament\Clusters\Frontends\Resources\AboutPageResource\Pages;

use App\Filament\Clusters\Frontends\Resources\AboutPageResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListAboutPages extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('hero_title')
                    ->label(__('Hero Title')),
                TextColumn::make('hero_subtitle'),
                TextColumn::make('hero_description_one'),
                TextColumn::make('hero_description_two'),
                TextColumn::make('hero_description_three'),
                TextColumn::make('hero_description_four'),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
