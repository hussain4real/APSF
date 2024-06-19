<?php

namespace App\Filament\Clusters\Resources\Resources\TrainingProgramResource\Pages;

use App\Filament\Clusters\Resources\Resources\TrainingProgramResource;
use App\Models\TrainingProgram;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Resources\Pages\ViewRecord\Concerns\Translatable;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Contracts\View\View;

class ViewTrainingProgram extends ViewRecord
{
    use Translatable;

    protected static string $resource = TrainingProgramResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Split::make([
                    Section::make(__('Program Details'))
                        ->icon('heroicon-o-information-circle')
                        ->iconColor('primary')
                        ->description(__('Information about the training program.'))
                        ->headerActions([
                            Action::make('enroll')
                                ->registerModalActions([
                                    Action::make('make_payment')
                                        ->button()
                                        ->size(ActionSize::Medium)
                                        ->color('primary')
                                        ->requiresConfirmation()
                                        ->action(function ($record) {
                                            //attach the auth user to the training program and set enrolled_at
                                            $record->users()->attach(auth()->user()->id, ['enrolled_at' => now()]);
                                            Notification::make('enrolled')
                                                ->info()
                                                ->body(__('You have successfully enrolled in the training program. Pending Payment'))
                                                ->send();

                                            //                                            return redirect()->route('enrolment.pay', ['trainingProgram' => $record]);
                                        }),
                                ])
                                ->action(function ($record) {
                                    //attach the auth user to the training program
                                    //                                    $record->users()->attach(auth()->user()->id);
                                    //                                    Notification::make('enrolled')
                                    //                                        ->info()
                                    //                                        ->body(__('You have successfully enrolled in the training program. Pending Payment'))
                                    //                                        ->send();
                                    //
                                    //                                    return redirect()->route('enrolment.pay', ['trainingProgram' => $record]);
                                })
                                ->modalContent(fn (TrainingProgram $record, Action $action): View => view(
                                    'enrolment.pay',
                                    [
                                        'trainingProgram' => $record,
                                        'action' => $action,
                                    ]
                                ))
                                ->modalWidth(MaxWidth::MinContent)
                                ->modalSubmitAction(false)
                                ->icon('heroicon-o-pencil-square'),
                        ])
                        ->schema([
                            SpatieMediaLibraryImageEntry::make('attachment')
                                ->hiddenLabel(true)
                                ->collection('banner')
                                ->disk('digitalocean')
                                ->visibility('public')
//                                ->defaultImageUrl(function ($record) {
//                                    return $record->user->profile_photo_url;
//                                })
                                ->height(320)
                                ->width(function () {
                                    //make the width responsive
                                    return '100%';
                                })

                                ->grow(false)
                                ->columnSpanFull()
                                ->alignment(Alignment::Center)
                                ->extraImgAttributes([
                                    'class' => 'rounded-lg shadow-md object-cover',
                                    'alt' => 'Banner',
                                    'id' => 'banner',
                                    'loading' => 'lazy',
                                ]),
                            //                            ImageEntry::make('photo')
                            //                                ->hiddenLabel(false)
                            //                            //                                ->collection('profile')
                            //                                ->disk('digitalocean')
                            //                                ->visibility('public')
                            //                                ->defaultImageUrl(function ($record) {
                            //                                    //                                    dd($record);
                            //
                            //                                    return $record->trainingProvider->user->profile_photo_url;
                            //                                })
                            //                            //                                ->height(250)
                            //                            //                                ->width(width: 250)
                            //                                ->circular()
                            //                                ->alignment(Alignment::End)
                            //                                ->grow(true),
                            TextEntry::make('trainingProvider.institution_name')
                                ->label(__('Training Provider'))
                                ->icon('heroicon-o-building-office-2')
                                ->iconColor('primary')
                                ->weight(FontWeight::Medium)
                                ->iconPosition(IconPosition::Before)
                                ->size(TextEntry\TextEntrySize::Medium),
                            TextEntry::make('title')
                                ->label(__('Program Title'))
                                ->weight(FontWeight::Medium)
                                ->size(TextEntry\TextEntrySize::Medium),
                            TextEntry::make('description')
                                ->label(__('Description'))
                                ->size(TextEntry\TextEntrySize::Medium)
                                ->columnSpanFull(),
                            TextEntry::make('duration')
                                ->label(__('Duration'))
                                ->icon('heroicon-o-clock')
                                ->iconColor('primary')
                                ->suffix(__(' /daily'))
                                ->size(TextEntry\TextEntrySize::Medium),
                            TextEntry::make('cost')
                                ->label(__('Cost'))
                                ->icon('heroicon-o-banknotes')
                                ->iconColor('primary')
                                ->money()
//                                ->suffix(' USD')
                                ->size(TextEntry\TextEntrySize::Medium),
                            TextEntry::make('instructor_name')
                                ->label(__('Instructor Name'))
                                ->icon('heroicon-o-user')
                                ->iconColor('primary')
                                ->size(TextEntry\TextEntrySize::Medium),
                            TextEntry::make('type')
                                ->label(__('Type'))
                                ->badge()
                                ->size(TextEntry\TextEntrySize::Medium),
                            TextEntry::make('mode_of_delivery')
                                ->label(__('Mode of Delivery'))
                                ->badge()
                                ->size(TextEntry\TextEntrySize::Medium),
                        ])
                        ->columns(2),
                    Section::make()
                        ->schema([
                            TextEntry::make('status')
                                ->label(__('Status'))
                                ->badge()
                                ->size(TextEntry\TextEntrySize::Medium),
                            TextEntry::make('start_date')
                                ->label(__('Start Date'))
                                ->dateTime('F j, Y, g:i a')
                                ->tooltip(function ($record) {
                                    return $record->start_date->diffForHumans();
                                })
                                ->badge()
                                ->color(function ($record) {
                                    if ($record->start_date->isPast()) {
                                        return 'danger';
                                    } elseif ($record->start_date->lt(\Carbon\Carbon::now()->addDays(2))) {
                                        return 'warning';
                                    } else {
                                        return 'info';
                                    }
                                })
                                ->size(TextEntry\TextEntrySize::Large),
                            TextEntry::make('end_date')
                                ->label(__('End Date'))
                                ->dateTime('F j, Y, g:i a')
                                ->tooltip(function ($record) {
                                    return $record->end_date->diffForHumans();
                                })
                                ->badge()
                                ->color(function ($record) {
                                    if ($record->end_date->isPast()) {
                                        return 'success';
                                    } elseif ($record->end_date->lt(\Carbon\Carbon::now()->addDays(10))) {
                                        return 'warning';
                                    } elseif ($record->end_date->lt(\Carbon\Carbon::now()->addDays(2))) {
                                        return 'danger';
                                    } else {
                                        return 'info';
                                    }
                                })
                                ->size(TextEntry\TextEntrySize::Medium),
                        ])
                        ->grow(false),
                ])
                    ->from('md')
                    ->columnSpanFull(),
            ]);
    }
}
