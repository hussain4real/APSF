<?php

namespace App\Filament\Pages;

use App\Models\Teacher;
use App\TraininingMode;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class TalentHub extends Page implements HasForms, HasTable
{
    use HasPageShield, InteractsWithForms, InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    protected static string $view = 'filament.pages.talent-hub';


    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\Teacher::query())
            ->columns([
                Stack::make([
                    View::make('entities.table.talent-hub')
                        ->components([
                            TextColumn::make('user.name')
                                ->label(__('Name'))
                                ->searchable(),
                            TextColumn::make('subject_taught')
                            ->label(__('Subject Taught'))
                                ->searchable(),
                            TextColumn::make('qualification')
                            ->label(__('Qualification'))
                                ->searchable(),
                            TextColumn::make('country')
                        ->label(__('Country'))
                                ->searchable()
                                ->sortable(),
                            TextColumn::make('status')
                                ->label(__('Status'))
                                ->searchable()
                                ->sortable(),
                            TextColumn::make('availability')
                            ->label(__('Availability'))
                                ->searchable()
                                ->sortable(),
                            TextColumn::make('bio')
                                ->label(__('Bio')),
                        ]),
                ]),

            ])
            ->contentGrid([
                'xl' => 2,

            ])
            // ->filters([
            //     SelectFilter::make('status')
            //         ->options(TrainingStatus::class),
            //     SelectFilter::make('type')
            //         ->options(TrainingType::class),
            //     //                SelectFilter::make('country')
            //     //                    ->options(Scholarship::all()->pluck('country')->unique()->mapWithKeys(function ($country) {
            //     //                        return [$country => $country];
            //     //                    }))
            //     //                    ->searchable()
            //     //                    ->preload(),
            //     SelectFilter::make('mode_of_delivery')
            //         ->options(TraininingMode::class),
            // ], layout: FiltersLayout::AboveContentCollapsible)
            ->actions([
                // ViewAction::make(),
            ])
            ->bulkActions([]);
    }
}
