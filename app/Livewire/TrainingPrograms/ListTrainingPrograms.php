<?php

namespace App\Livewire\TrainingPrograms;

use App\Http\Integrations\PaymentGateway\Pay2mConnector;
use App\Http\Integrations\PaymentGateway\Requests\GetAccessTokenRequest;
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
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\MaxWidth;
use Filament\Tables;
use Filament\Tables\Actions\Action as ActionsAction;
use Filament\Tables\Actions\ViewAction;
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
                ViewAction::make(),

                Tables\Actions\Action::make('enroll')
                    ->button()
                    ->action(function ($record) {
                        //attach the auth user to the training program
                        if (auth()->user()) {
                            $record->users()->attach(auth()->user()->id);
                            Notification::make('enrolled')
                                ->info()
                                ->body(__('You have successfully enrolled in the training program. Pending Payment'))
                                ->send();
                            return redirect()->route('enrolment.pay', ['record' => $record]);
                        } else {
                            return redirect()->route('login');
                        }
                    }),
                    // ->url(fn (TrainingProgram $record): string => route('enrolment.pay', [
                    //     'record' => $record,
                    // ])),

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

    public function convertCurrency($amount, $from, $to)
    {
        $url = "https://api.exchangerate-api.com/v4/latest/$from";
        $response = file_get_contents($url);
        $result = json_decode($response, true);
        $rate = $result['rates'][$to];
        $converted_amount = $amount * $rate;
        return $converted_amount;
    }
}
