<?php

namespace App\Filament\Clusters\Resources\Resources\ScholarshipResource\Pages;

use App\Filament\Clusters\Resources\Resources\ScholarshipResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ListScholarships extends ListRecords
{
    protected static string $resource = ScholarshipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    View::make('entities.table.scholarship')
                        ->components([
                            TextColumn::make('title')
                                ->searchable(),
                            TextColumn::make('description'),
                            TextColumn::make('institution')
                                ->searchable(),
                            TextColumn::make('start_date')
                                ->date()
                                ->sortable(),
                            TextColumn::make('end_date')
                                ->date()
                                ->sortable(),
                            TextColumn::make('status')
                                ->badge(),
                            TextColumn::make('type')
                                ->badge(),
                            TextColumn::make('created_at')
                                ->dateTime()
                                ->sortable()
                                ->toggleable(isToggledHiddenByDefault: true),
                            TextColumn::make('updated_at')
                                ->dateTime()
                                ->sortable()
                                ->toggleable(isToggledHiddenByDefault: true),
                        ]),
                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                //
            ])
            ->actions([
                //                ViewAction::make(),
                EditAction::make()
                    ->extraAttributes([
                        //                        'class' => 'mx-auto',
                    ]),
            ])
            ->bulkActions([
                //                BulkActionGroup::make([
                //                    DeleteBulkAction::make(),
                //                ]),
            ]);
    }
}
