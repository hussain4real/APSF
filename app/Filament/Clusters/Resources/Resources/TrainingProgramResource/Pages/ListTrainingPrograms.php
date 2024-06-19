<?php

namespace App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;

use App\Filament\Clusters\Resources\Resources\TrainingProgramResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class ListTrainingPrograms extends ListRecords
{

    use Translatable;
    protected static string $resource = TrainingProgramResource::class;

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
            ->modifyQueryUsing(function ($query) {
                return $query->with('trainingProvider', 'media');
            })
            ->columns([
                Stack::make([
                    View::make('entities.table.training_programs')
                        ->components([
                            TextColumn::make('user.id')
                                ->numeric()
                                ->sortable(),
                            TextColumn::make('title')
                                ->searchable(),
                            TextColumn::make('duration')
                                ->searchable(),
                            TextColumn::make('cost')
                                ->money()
                                ->sortable(),
                            TextColumn::make('instructor_name')
                                ->searchable(),
                            TextColumn::make('mode_of_delivery')
                                ->searchable(),
                            TextColumn::make('type')
                                ->searchable(),
                            TextColumn::make('status')
                                ->searchable(),
                            TextColumn::make('start_date')
                                ->dateTime()
                                ->sortable(),
                            TextColumn::make('end_date')
                                ->dateTime()
                                ->sortable(),
                            TextColumn::make('deleted_at')
                                ->dateTime()
                                ->sortable()
                                ->toggleable(isToggledHiddenByDefault: true),
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
                TrashedFilter::make(),
            ])
            ->actions([
                ViewAction::make()
                    ->hidden(false),
                EditAction::make()
                    ->extraAttributes([
                        //                        'class' => 'mx-auto',
                    ]),
            ])
            ->bulkActions([
                //                BulkActionGroup::make([
                //                    DeleteBulkAction::make(),
                //                    ForceDeleteBulkAction::make(),
                //                    RestoreBulkAction::make(),
                //                ]),
            ]);
    }
}
