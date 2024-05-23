<?php

namespace App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;

use App\Filament\Clusters\Resources\Resources\TrainingProgramResource;
use App\TrainingType;
use App\TraininingMode;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTrainingProgram extends CreateRecord
{
    protected static string $resource = TrainingProgramResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Split::make([
                    Section::make('Program Details')
                        ->icon('heroicon-o-information-circle')
                        ->iconColor('primary')
                        ->description(__('Enter the details of the training program,
                            The training program details will be used to provide information to the users.'))
                        ->headerActions([
                            Action::make('reset')
                                ->hiddenLabel()
                                ->tooltip(__('Reset the form to its default state.'))
                                ->action(function () {
                                    $this->reset();
                                    Notification::make('form_reset')
                                        ->info()
                                        ->body(__('The form has been reset.'))
                                        ->send();
                                })
                                ->keyBindings(['command+x', 'ctrl+x'])
                                ->requiresConfirmation()
                                ->icon('heroicon-o-arrow-path')
                                ->color('secondary'),
                        ])
                        ->schema([
                            Hidden::make('training_provider_id')
                                ->disabled()
                                ->dehydrated()
                                ->default(auth()?->user()?->trainingProvider->id ?? null),
                            ToggleButtons::make('type')
                                ->options(TrainingType::class)
                                ->default('course')
                                ->inline()
                                ->columnSpanFull(),
                            TextInput::make('title')
                                ->label(__('Title'))
                                ->placeholder(__('Training Program Title'))
                                ->required()
                                ->maxLength(255),
                            //                                ->afterStateUpdated(function (Set $set) {
                            //                                    $set('instructor_name', auth()->user()->name);
                            //                                })
                            //                                ->live(onBlur: true),
                            TextInput::make('instructor_name')
                                ->label(__('Instructor Name'))
                                ->default(function () {
                                    return auth()->user()->name;
                                })
                                ->hintIcon('heroicon-o-information-circle')
                                ->hintColor('secondary')
                                ->hintIconTooltip(__('If you are not the instructor, please enter the name of the instructor.'))
                                ->maxLength(255)
                                ->required(),
                            Textarea::make('description')
                                ->label(__('Description'))

                                ->placeholder(__('Training Program Description'))
                                ->columnSpanFull(),
                            TextInput::make('duration')
                                ->label(__('Duration'))
                                ->suffix(__('daily'))
                                ->placeholder(__('40 minutes, 1 hour, 2 days, etc.'))
                                ->hintIcon('heroicon-o-information-circle')
                                ->hintColor('secondary')
                                ->hintIconTooltip(__('The duration of the program daily.'))
                                ->maxLength(255),
                            TextInput::make('cost')
                                ->label(__('Cost'))
                                ->placeholder(__('1000.00'))
                                ->numeric()
                                ->inputMode('decimal')
                                ->prefix('$'),

                            ToggleButtons::make('mode_of_delivery')
                                ->required()
                                ->options(TraininingMode::class)
                                ->default(TraininingMode::ONLINE)
                                ->inline()
                                ->columnSpanFull(),
                        ])
                        ->columns(2),
                    Section::make('Dates')
                        ->id('date')
                        ->icon(__('heroicon-o-calendar'))
                        ->iconColor('primary')
                        ->schema([

                            //                            TextInput::make('status')
                            //                                ->required()
                            //                                ->maxLength(255)
                            //                                ->default('upcoming'),
                            DateTimePicker::make('start_date')
                                ->label(__('Start Date'))
                                ->placeholder(__('YYYY-MM-DD HH:MM'))
                                ->native(false),
                            DateTimePicker::make('end_date')
                                ->label(__('End Date'))
                                ->placeholder(__('YYYY-MM-DD HH:MM'))
                                ->native(false),
                        ])
                        ->columns(1)
                        ->grow(false),
                ])

                    ->columnSpanFull()
                    ->from('md'),

            ]);
    }

    protected function handleRecordCreation(array $data): Model
    {
        //        dd($data);

        if (! $data['training_provider_id']) {
            $data['training_provider_id'] = auth()->user()->id;
        }

        //        dd($data);

        return static::getModel()::create($data);

    }
}
