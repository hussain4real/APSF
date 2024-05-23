<?php

namespace App\Filament\Clusters\Users\Resources\UserResource\Pages;

use App\Filament\Clusters\Users\Resources\UserResource;
use App\Models\Review;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\IconPosition;
use Filament\Support\Enums\IconSize;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Components\Rating;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    //    protected function getTableQuery(): ?Builder
    //    {
    //        return User::query()->withoutGlobalScopes([
    //            \App\Models\Scopes\MemberScope::class,
    //        ]);
    //    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    View::make('entities.table.profile')
                        ->components([
                            TextColumn::make('name')
                                ->label(__('Name'))
                                ->size(TextColumnSize::Medium)
                                ->searchable()
                                ->alignCenter()
                                ->weight(FontWeight::SemiBold),
                            TextColumn::make('email')
                                ->label(__('Email'))
                                ->icon('heroicon-o-envelope')
                                ->iconPosition(IconPosition::Before)
                                ->searchable()
                                ->iconColor('primary')
                                ->color('gray')
                                ->weight(FontWeight::Medium)
                                ->alignCenter(),
                            //                            TextColumn::make('created_at')
                            //                                ->label(__('Created'))
                            //                                ->date(format: 'M d, Y')
                            //                                ->badge()
                            //                                ->tooltip('Date of account creation')
                            //                                ->icon('heroicon-o-calendar-days')
                            //                                ->color('primary')
                            //                                ->sortable()
                            //                                ->alignCenter(),
                            TextColumn::make('status')
                                ->badge()
                                ->state(function ($record) {
                                    return match (true) {
                                        $record->student !== null => $record->student->status,
                                        $record->teacher !== null => $record->teacher->status,
                                        $record->schools !== null && $record->schools->isNotEmpty() => $record->schools->first()->status,
                                        $record->contractor !== null => $record->contractor->status,
                                        $record->educationalConsultant !== null => $record->educationalConsultant->status,
                                        $record->founder !== null => $record->founder->status,
                                        $record->member !== null => $record->member->status,
                                        $record->trainingProvider !== null => $record->trainingProvider->status,
                                        default => $record->status,
                                    };
                                })
                                ->alignCenter()
                                ->extraAttributes([
                                    'class' => 'my-2',
                                ])
                                ->sortable(),
                            RatingColumn::make('rating')
                                ->label(__('Rating'))
                                ->state(function (Model $record) {
                                    return $record->rating ?? 0;
                                })
                                ->size('sm')
                                ->color('warning')
                                ->alignCenter()
                                ->allowZero(),
                        ])
                        ->collapsed()
                        ->extraAttributes([

                        ]),

                ])
                    ->alignment(Alignment::Start),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,

            ])
            ->filters([
                //                TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    Action::make('rate')
                        ->visible(function (Model $record) {
                            $user = auth()->user();
                            $roles = ['student', 'teacher', 'schools', 'contractor', 'educationalConsultant', 'founder', 'member', 'trainingProvider'];
                            $record->loadCount($roles);
                            foreach ($roles as $role) {
                                if ($record->{"{$role}_count"} > 0 && $record->$role->user_id === $user->id) {
                                    return false;
                                }
                            }

                            return true;
                        })
                        ->icon('heroicon-o-star')
                        ->fillForm(function (Model $record): array {
                            $user = auth()->user();
                            $roles = ['student', 'teacher', 'schools', 'contractor', 'educationalConsultant', 'founder', 'member', 'trainingProvider'];
                            $record->load($roles);

                            $rating = 0;
                            $comment = '';

                            foreach ($roles as $role) {
                                if ($record->$role) {
                                    if ($role === 'schools') {
                                        foreach ($record->$role as $school) {
                                            $review = $school->reviews()->where('user_id', $user->id)->first();
                                            if ($review) {
                                                $rating = $review->rating;
                                                $comment = $review->comment;
                                                break;
                                            }
                                        }
                                    } else {
                                        $review = $record->$role->reviews()->where('user_id', $user->id)->first();
                                        if ($review) {
                                            $rating = $review->rating;
                                            $comment = $review->comment;
                                        }
                                    }
                                }
                            }

                            return [
                                'rating' => $rating,
                                'comment' => $comment,
                            ];
                        })
                        ->form([
                            Rating::make('rating')
                                ->stars(5)
                                ->allowZero(true),
                            Textarea::make('comment')
                                ->label(__('Comment'))
                                ->placeholder('Enter your comment here'),
                        ])
                        ->action(function (array $data, Model $record): void {
                            $user = auth()->user();
                            $roles = ['student', 'teacher', 'schools', 'contractor', 'educationalConsultant', 'founder', 'member', 'trainingProvider'];
                            $record->loadCount($roles);

                            foreach ($roles as $role) {
                                if ($record->{"{$role}_count"} > 0) {
                                    if ($role === 'schools') {
                                        foreach ($record->$role as $school) {
                                            $this->handleRatingAndComment($school, $user, $data);
                                        }
                                    } else {
                                        $this->handleRatingAndComment($record->$role, $user, $data);
                                    }
                                }
                            }
                        }),
                ])
                    ->link()
                    ->icon('heroicon-m-ellipsis-horizontal')
//                    ->iconButton()
                    ->iconSize(IconSize::Medium)
                    ->color(Color::Amber)
                    ->label(__('Actions'))
                    ->hiddenLabel(true)
                    ->size(ActionSize::Large)
                    ->iconPosition(IconPosition::Before)
                    ->tooltip(__('Click to view available actions'))
                    ->extraAttributes([
                        'class' => 'mx-16',
                        //                        ml-16 my-1
                    ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }

    protected function handleRatingAndComment($entity, $user, $data): void
    {
        //        dd($user->id);
        //        Log::info('handleRatingAndComment called', [$entity, $user, $data]);
        if ($entity->user_id === $user->id) {
            Notification::make('Rating Error')
                ->title('Rating Error')
                ->danger()
                ->body('You cannot rate yourself')
                ->send();

            return;
        }

        if ($entity->reviews()->where('user_id', $user->id)->exists()) {
            $entity->reviews()->where('user_id', $user->id)->update([
                'rating' => $data['rating'],
                'comment' => $data['comment'],
            ]);
        } else {
            $review = new Review([
                'rating' => $data['rating'],
                'comment' => $data['comment'],
                'reviewable_id' => $entity->id,
                'reviewable_type' => get_class($entity),
                'user_id' => $user->id,
            ]);
            $entity->reviews()->save($review);
        }

        Notification::make('Rating Updated')
            ->title('Rating Updated')
            ->success()
            ->body('Rating has been updated successfully')
            ->send();
    }
}
