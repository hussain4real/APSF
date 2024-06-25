<?php

namespace App\Livewire\TrainingPrograms;

use App\Http\Integrations\PaymentGateway\Pay2mConnector;
use App\Http\Integrations\PaymentGateway\Requests\GetAccessTokenRequest;
use App\Models\Scholarship;
use App\Models\TrainingProgram;
use App\TrainingStatus;
use App\TrainingType;
use App\TraininingMode;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
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
use Illuminate\Support\Number;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ListTrainingPrograms extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;


    public TrainingProgram $trainingProgram;

    public function form(Form $form): Form
    {
        return $form
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
                Textarea::make('description')
                    ->label(__('Description'))

                    ->placeholder(__('Training Program Description'))
                    ->columnSpanFull(),
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
            ->columns(2);
    }

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
                '4xl' => 4,
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
                // Tables\Actions\Action::make('view')
                //     ->action(function ($record) {
                //         return redirect()->route('training-programs.show', ['record' => $record])
                //             ->with('record', $record);
                //     }),
                // ->url(fn (TrainingProgram $record): string => route('training-programs.view', [
                //     'record' => $record,
                // ])->with('record', $record)),
                // ),

                Tables\Actions\Action::make('enroll')
                    ->button()
                    ->action(function ($record) {
                        //attach the auth user to the training program
                        if (auth()->user()) {
                            //if the user is already enrolled in the training program return with a message
                            if ($record->users()->where('user_id', auth()->user()->id)->exists()) {
                                Notification::make('enrolled')
                                    ->info()
                                    ->body(__('You are already enrolled in the training program.'))
                                    ->sendToDatabase(auth()->user());
                                return redirect()->back();
                            }
                            $record->users()->attach(auth()->user()->id);
                            if ($record->regular_price > 0) {
                                $record->users()->updateExistingPivot(auth()->user()->id, ['status' => 'pending']);
                                Notification::make('enrolled')
                                    ->info()
                                    ->body(__('You have successfully enrolled in the training program. Pending Payment'))
                                    ->sendToDatabase(auth()->user());
                                return redirect()->route('enrolment.pay', ['record' => $record]);
                            } else {
                                $record->users()->updateExistingPivot(auth()->user()->id, ['status' => 'enrolled']);
                                Notification::make('enrolled')
                                    ->info()
                                    ->body(__('You have successfully enrolled in the training program.'))
                                    ->sendToDatabase(auth()->user());
                                return redirect()->route('failed')
                                    ->with('success', 'You have successfully enrolled in the training program.');
                            }
                        } else {
                            Notification::make('enrolled')
                                ->info()
                                ->body(__('You need to login to enroll in the training program.'))
                                ->send();
                            return redirect()->route(' filament.admin.auth.login');
                        }
                    })
                    ,

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
