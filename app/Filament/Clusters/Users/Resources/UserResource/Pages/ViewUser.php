<?php

namespace App\Filament\Clusters\Users\Resources\UserResource\Pages;

use App\Filament\Clusters\Users\Resources\UserResource;
use App\Models\Review;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ViewEntry;
use Filament\Infolists\Infolist;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Illuminate\Database\Eloquent\Model;
use Mokhosh\FilamentRating\Components\Rating;
use Mokhosh\FilamentRating\Entries\RatingEntry;

class ViewUser extends ViewRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Split::make([
                    Section::make([
                        Group::make([
                            //                            TextEntry::make('id')
                            //                                ->label(__('ID'))
                            //                                ->icon('heroicon-o-identification')
                            //                                ->iconColor('primary'),
                            //                            TextEntry::make('username')
                            //                                ->label(__('Username'))
                            //                                ->icon('heroicon-o-user')
                            //                                ->iconColor('primary'),
                            SpatieMediaLibraryImageEntry::make('user.profile_photo_path')
                                ->label(__('Profile Photo'))
                                ->hiddenLabel()
                                ->collection('profile_photo')
                                ->defaultImageUrl(fn ($record) => $record->profile_photo_url)
                                ->size(300)
                                ->alignment(Alignment::Center)
                                ->extraImgAttributes([
                                    'class' => 'rounded-lg shadow-md object-cover object-center',
                                    'alt' => 'Profile Photo',
                                    'loading' => 'lazy',
                                ]),
                            Group::make([
                                TextEntry::make('name')
                                    ->label(__('Name'))
                                    ->icon('heroicon-o-user-circle')
                                    ->iconColor('primary'),

                                TextEntry::make('email')
                                    ->label(__('Email'))
                                    ->icon('heroicon-o-envelope')
                                    ->iconColor('primary'),
                                TextEntry::make('phone_number')
                                    ->label(__('Phone'))
                                    ->icon('heroicon-o-phone')
                                    ->iconColor('primary'),
                            ]),
                        ])
                            ->columns(2),

                        Group::make([

                            TextEntry::make('address')
                                ->label(__('Address'))
                                ->icon('heroicon-o-map-pin')
                                ->iconColor('primary'),
                            TextEntry::make('country')
                                ->label(__('Country'))
                                ->icon('heroicon-o-flag')
                                ->iconColor('primary'),
                            TextEntry::make('date_of_birth')
                                ->label(__('Date of Birth'))
                                ->icon('heroicon-o-calendar')
                                ->iconColor('primary')
                                ->date(format: 'M d, Y'),
                        ])
                            ->columns(2),
                    ]),
                    Group::make([
                        Section::make([
                            ViewEntry::make('rating')
                                ->view('infolists.components.rating-review')
                                ->label(__('Rating'))
                                ->registerActions([
                                    Action::make('rate')
                                        ->icon('heroicon-o-arrows-up-down')
                                        ->hiddenLabel()
                                        ->color(Color::Yellow)
                                        ->link()
                                        ->visible(function (Model $record) {
                                            $user = auth()->user();
                                            $roles = ['student', 'teacher', 'schools', 'contractor', 'educationalConsultant', 'founder', 'member', 'trainingProvider'];
                                            $record->load($roles);
                                            foreach ($roles as $role) {
                                                if ($record->$role?->user_id === $user->id) {
                                                    return false;

                                                }

                                                return true;
                                            }
                                        })
                                        ->tooltip(__('Rate this student'))
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
                                                ->allowZero(true)
                                                ->color('warning'),
                                            Textarea::make('comment')
                                                ->label(__('Comment'))
                                                ->placeholder('Enter your comment here'),
                                        ])
                                        ->action(function (array $data, Model $record): void {
                                            $user = auth()->user();
                                            $roles = ['student', 'teacher', 'schools', 'contractor', 'educationalConsultant', 'founder', 'member', 'trainingProvider'];
                                            $record->load($roles);

                                            //                            Log::info('Rate action called', [$record, $user, $data]);
                                            foreach ($roles as $role) {
                                                if ($record->$role) {
                                                    if ($role === 'schools') {
                                                        foreach ($record->$role as $school) {
                                                            $this->handleRatingAndComment($school, $user, $data);
                                                        }
                                                    } else {
                                                        $this->handleRatingAndComment($record->$role, $user, $data);
                                                    }
                                                }
                                            }
                                            //                            // Handle rating and commenting for normal users
                                            //                            if (! $record->student && ! $record->teacher && ! $record->schools && ! $record->contractor && ! $record->educationalConsultant && ! $record->founder && ! $record->member && ! $record->trainingProvider) {
                                            //                                $this->handleRatingAndComment($record, $user, $data);
                                            //                            }
                                        }),
                                    Action::make('view_reviews')
                                        ->hiddenLabel()
                                        ->tooltip(__('View reviews'))
                                        ->icon('heroicon-o-eye')
                                        ->link()
                                        ->infolist(function (Infolist $infolist): Infolist {
                                            return $infolist
                                                ->record($this->record)
                                                ->schema([
                                                    Section::make([
                                                        RepeatableEntry::make('reviews')
                                                            ->state(function ($record) {
                                                                return $record->reviews;
                                                            })
                                                            ->label(__('Reviews'))
                                                            ->grid([
                                                                'sm' => 2,
                                                                'lg' => 3,
                                                            ])
                                                            ->columnSpanFull()
                                                            ->schema([
                                                                TextEntry::make('rating')
                                                                    ->label(__('Rating'))
                                                                    ->badge()
                                                                    ->color(function ($record) {
                                                                        $rating = floor($record->rating);
                                                                        switch ($rating) {
                                                                            case 1:
                                                                                return Color::Red;
                                                                            case 2:
                                                                                return Color::Orange;
                                                                            case 3:
                                                                                return Color::Yellow;
                                                                            case 4:
                                                                            case 5:
                                                                                return Color::Green;
                                                                            default:
                                                                                return Color::Gray;
                                                                        }
                                                                    }),
                                                                TextEntry::make('comment')
                                                                    ->label(__('Review')),
                                                                TextEntry::make('user.name')
                                                                    ->label(__('Reviewer')),
                                                            ]),
                                                    ])
                                                        ->description(__('Reviews for this student'))
                                                        ->icon('heroicon-o-star')
                                                        ->iconColor('info')
                                                        ->collapsible(),
                                                ]);
                                        })
                                        ->modalSubmitAction(false)
                                        ->modalCancelActionLabel(__('Close')),
                                ]),
                            RatingEntry::make('rating')
                                ->label(__('Rating'))
                                ->state(function ($record) {
                                    return $record->rating;
                                })
                                ->color('warning'),
                            TextEntry::make('status')
                                ->label(__('Status'))
                                ->badge(),
                            TextEntry::make('created_at')
                                ->label(__('Joined '))
                                // ->date(format: 'M d, Y')
                                ->since()
                                ->color(Color::Sky)
                                ->icon('heroicon-o-user-plus')
                                ->iconColor('primary'),
                            TextEntry::make('updated_at')
                                ->label(__('Profile Updated'))
                                ->since()
                                ->color(Color::Sky)
                                ->icon('heroicon-o-arrows-right-left')
                                ->iconColor('primary'),
                        ]),
                    ])
                        ->grow(false),
                ])
                    ->from('md')
                    ->columnSpanFull(),
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
