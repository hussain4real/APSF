<?php

namespace App\Filament\Clusters\Frontends\Resources\EventResource\Pages;

use App\Filament\Clusters\Frontends\Resources\EventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListEvents extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('event_title')
                    ->label(__('Event Name')),
                TextColumn::make('event_excerpt')
                    ->label(__('Event Excerpt'))
                    ->wrap()
                    ->limit(50)
                    ->lineClamp(3),
                TextColumn::make('event_start_date')
                    ->label(__('Event Start Date'))
                    ->dateTime()
                    ->badge(function ($record) {
                        //use carbon to determine if the events is in the past
                        return $record->event_start_date->isPast() ? 'danger' : 'success';
                    }),

                TextColumn::make('event_end_date')
                    ->label(__('Event End Date'))
                    ->placeholder('No end date')
                    ->badge(function ($record) {
                        //use carbon to determine if the events is in the past
                        return $record?->event_end_date?->isPast() ? 'danger' : 'success';
                    }),
                TextColumn::make('event_location')
                    ->label(__('Event Location')),
                TextColumn::make('type')
                    ->label(__('Event Type'))
                    ->badge(),
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
