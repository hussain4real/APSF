<?php

namespace App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Clusters\Resources\Resources\TrainingProgramResource;
use App\TrainingType;
use App\TraininingMode;
use Filament\Actions\Action as ActionsAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Split;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Number;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CreateTrainingProgram extends CreateRecord
{
    use Translatable;
    protected static string $resource = TrainingProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

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
                            Action::make('fillform')
                                ->icon('heroicon-o-sparkles')
                                ->color('success')
                                ->outlined()
                                ->action(function (Set $set, Page $livewire) {
                                    //first check the language
                                    if (app()->getLocale() == 'en') {
                                        $set('title', 'Learn the art of Giving');
                                        $set('instructor_name', auth()->user()->name);
                                        $set('description', 'This is a training program that teaches you how to give and receive.');
                                        $set('duration', '40 minutes/day, ');
                                        $set('regular_price', '1000.00');
                                        $set('member_price', '600.00');
                                        $set('mode_of_delivery', TraininingMode::ONLINE);
                                        $set('type', TrainingType::COURSE);
                                        $set('start_date', now()->format('Y-m-d H:i'));
                                        $set('end_date', now()->addDays(7)->format('Y-m-d H:i'));
                                        $livewire->form->getState();
                                    }

                                    if (app()->getLocale() == 'ar') {
                                        $set('title', 'تعلم فن العطاء');
                                        $set('instructor_name', auth()->user()->name);
                                        $set('description', 'هذا برنامج تدريبي يعلمك كيف تعطي وتستقبل.');
                                        $set('duration', '40 دقيقة / يوم');
                                        $set('regular_price', '1000.00');
                                        $set('member_price', '600.00');
                                        $set('mode_of_delivery', TraininingMode::ONLINE);
                                        $set('type', TrainingType::COURSE);
                                        $set('start_date', now()->format('Y-m-d H:i'));
                                        $set('end_date', now()->addDays(7)->format('Y-m-d H:i'));
                                        $livewire->form->getState();
                                    }
                                    // $livewire->emit('notify', 'Form filled with default values.');
                                })
                        ])
                        ->schema([
                            Select::make('user_id')
                                ->relationship('trainingProvider', 'name')
                                ->disabled(fn (): bool => !auth()->user()->can('create', 'create_training::program'))
                                ->dehydrated()
                                ->default(auth()?->user()?->id ?? null),
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
                            TinyEditor::make('description')
                                ->label(__('Description'))
                                ->profile('full')
                                ->direction('auto')
                                ->columnSpanFull(),
                            // Textarea::make('description')
                            //     ->label(__('Description'))

                            //     ->placeholder(__('Training Program Description'))
                            //     ->columnSpanFull(),
                            TextInput::make('duration')
                                ->label(__('Duration'))
                                ->placeholder(__('40 minutes/day, 1 hour/week, 2 days, etc.'))
                                ->hintIcon('heroicon-o-information-circle')
                                ->hintColor('secondary')
                                ->hintIconTooltip(__('The duration of the program.'))
                                ->maxLength(255),
                            TextInput::make('regular_price')
                                ->label(__('Price'))
                                ->placeholder(__('1000.00'))
                                ->numeric()
                                ->inputMode('decimal')
                                ->prefix('$'),

                            TextInput::make('member_price')
                                ->label(__('Member Price'))
                                ->placeholder(__('1000.00'))
                                ->numeric()
                                ->inputMode('decimal')
                                ->prefix('$'),
                            ToggleButtons::make('mode_of_delivery')
                                ->required()
                                ->options(TraininingMode::class)
                                ->default(TraininingMode::ONLINE)
                                ->inline(),
                            SpatieMediaLibraryFileUpload::make('attachment')
                                ->collection('banner')
                                ->hiddenLabel()
                                ->responsiveImages()
                                ->maxSize(1024 * 10)
                                ->hint(__('Maximum size: ' . Number::fileSize(1024 * 1000 * 10) . ' bytes.'))
                                ->hintIcon('heroicon-o-information-circle')
                                ->hintColor('warning')
                                ->hintIconTooltip(__('Accepted file types: png, jpg, jpeg, gif, svg, webp.'))
                                ->imagePreviewHeight('300')
                                ->previewable()
                                ->openable()
                                ->getUploadedFileNameForStorageUsing(
                                    fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                        ->prepend('training_media/'),
                                )
                                //                                ->reorderable()
                                //                                ->appendFiles()
                                ->moveFiles()
                                // ->downloadable()
                                ->imageEditor(2)
                                ->imageEditorEmptyFillColor('#dda581')
                                ->uploadingMessage(__('uploading, please wait...'))
                                ->columnSpanFull(),
                            TextInput::make('link')
                                ->label(__('Links'))
                                ->url()
                                ->live(onBlur: true)
                                ->suffixIcon('heroicon-m-globe-alt')
                                ->suffixIconColor(function (Get $get) {
                                    if ($get('link')) {
                                        return 'info';
                                    }
                                    return 'warning';
                                })

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

    // protected function handleRecordCreation(array $data): Model
    // {
    //     //        dd($data);

    //     if (!$data['training_provider_id']) {
    //         $data['training_provider_id'] = auth()->user()->id;
    //     }

    //     //        dd($data);

    //     return static::getModel()::create($data);
    // }

    protected function getCreateFormAction(): ActionsAction
    {
        return parent::getCreateFormAction()
            ->submit(null)
            ->requiresConfirmation()
            ->action(function () {
                $this->closeActionModal();
                $this->create();
            });
    }
}
