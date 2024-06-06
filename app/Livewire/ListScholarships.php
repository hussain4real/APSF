<?php

namespace App\Livewire;

use App\Models\Scholarship;
use App\ScholarshipStatus;
use App\ScholarshipType;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Filters\QueryBuilder;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Livewire\Component;

class ListScholarships extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Scholarship::query())
            ->columns([
                Stack::make([
                    View::make('entities.table.scholarships_front')
                        ->components([
                            TextColumn::make('name')
                                ->searchable(),

                            TextColumn::make('institution')
                                ->searchable(),
                            TextColumn::make('program')
                                ->searchable()
                                ->sortable(),
                            TextColumn::make('start_date')
                                ->date()
                                ->sortable(),
                            TextColumn::make('end_date')
                                ->date()
                                ->sortable(),
                            TextColumn::make('status')
                                ->badge(),
                            TextColumn::make('country')
                                ->searchable()
                                ->sortable(),
                        ]),
                ]),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
                '2xl' => 4,
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(ScholarshipStatus::class),
                SelectFilter::make('type')
                    ->options(ScholarshipType::class),
                SelectFilter::make('country')
                    ->options(Scholarship::all()->pluck('country')->unique()->mapWithKeys(function ($country) {
                        return [$country => $country];
                    }))
                    ->searchable()
                    ->preload(),
                SelectFilter::make('program')
                    ->options(Scholarship::all()->pluck('program')->unique()->mapWithKeys(function ($program) {
                        return [$program => $program];
                    }))
                    ->searchable()
                    ->preload(),
                QueryBuilder::make()->constraints([
                    QueryBuilder\Constraints\TextConstraint::make('program')
                        ->label(__('Program/Course'))
                        ->icon('heroicon-o-academic-cap'),
                ]),
            ], layout: FiltersLayout::AboveContentCollapsible)
            ->actions([
                //                ViewAction::make(),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.list-scholarships');
    }
}
