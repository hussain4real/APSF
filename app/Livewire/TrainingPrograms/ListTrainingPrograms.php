<?php

namespace App\Livewire\TrainingPrograms;

use App\Models\Scholarship;
use App\Models\TrainingProgram;
use App\TrainingStatus;
use App\TrainingType;
use App\TraininingMode;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Infolists\Components\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class ListTrainingPrograms extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(TrainingProgram::query())
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    Tables\Columns\Layout\View::make('entities.table.training_programs_front')
                        ->components([
                            Tables\Columns\TextColumn::make('trainingProvider.id')
                                ->numeric()
                                ->sortable(),
                            Tables\Columns\TextColumn::make('title')
                                ->searchable(),
                            Tables\Columns\TextColumn::make('duration')
                                ->searchable(),
                            Tables\Columns\TextColumn::make('cost')
                                ->money()
                                ->sortable(),
                            Tables\Columns\TextColumn::make('instructor_name')
                                ->searchable(),
                            Tables\Columns\TextColumn::make('mode_of_delivery')
                                ->searchable(),
                            Tables\Columns\TextColumn::make('type')
                                ->searchable()
                                ->sortable(),
                            Tables\Columns\TextColumn::make('status')
                                ->searchable()
                                ->sortable(),
                            Tables\Columns\TextColumn::make('start_date')
                                ->dateTime()
                                ->sortable(),
                            Tables\Columns\TextColumn::make('end_date')
                                ->dateTime()
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
                    ->options(TrainingStatus::class),
                SelectFilter::make('type')
                    ->options(TrainingType::class),
                //                SelectFilter::make('country')
                //                    ->options(Scholarship::all()->pluck('country')->unique()->mapWithKeys(function ($country) {
                //                        return [$country => $country];
                //                    }))
                //                    ->searchable()
                //                    ->preload(),
                SelectFilter::make('mode_of_delivery')
                    ->options(TraininingMode::class),
            ], layout: Tables\Enums\FiltersLayout::AboveContentCollapsible)
            ->actions([
                Tables\Actions\Action::make('enroll')
//                    ->registerModalActions([
//                        Action::make('make_payment')
                    ->button()
                    ->size(ActionSize::Medium)
                    ->color('primary'),
                    // ->requiresConfirmation()
                    // ->url(function (Model $record) {
                    //     return route('enrolment.pay', ['trainingProgram' => $record]);
                    // }),
                //                            ->action(function ($record) {
                //                                //attach the auth user to the training program and set enrolled_at
                //                                $record->users()->attach(auth()->user()->id, ['enrolled_at' => now()]);
                //                                Notification::make('enrolled')
                //                                    ->info()
                //                                    ->body(__('You have successfully enrolled in the training program. Pending Payment'))
                //                                    ->send();
                //
                //                                //                                            return redirect()->route('enrolment.pay', ['trainingProgram' => $record]);
                //                            }),
                //                    ])
                //                    ->action(function ($record) {
                //                        //attach the auth user to the training program
                //                        //                                    $record->users()->attach(auth()->user()->id);
                //                        //                                    Notification::make('enrolled')
                //                        //                                        ->info()
                //                        //                                        ->body(__('You have successfully enrolled in the training program. Pending Payment'))
                //                        //                                        ->send();
                //                        //
                //                        //                                    return redirect()->route('enrolment.pay', ['trainingProgram' => $record]);
                //                    })
                //                    ->modalContent(fn (TrainingProgram $record, Action $action): View => view(
                //                        'enrolment.pay',
                //                        [
                //                            'trainingProgram' => $record,
                //                            'action' => $action,
                //                        ]
                //                    ))
                //                    ->modalWidth(MaxWidth::MinContent)
                //                    ->modalSubmitAction(false)
                //                    ->icon('heroicon-o-pencil-square'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.training-programs.list-training-programs');
    }
}
