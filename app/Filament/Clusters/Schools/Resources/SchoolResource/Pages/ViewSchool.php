<?php

namespace App\Filament\Clusters\Schools\Resources\SchoolResource\Pages;

use App\Filament\Clusters\Schools\Resources\SchoolResource;
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
use Illuminate\Database\Eloquent\Model;
use Mokhosh\FilamentRating\Components\Rating;
use Mokhosh\FilamentRating\Entries\RatingEntry;

class ViewSchool extends ViewRecord
{
    protected static string $resource = SchoolResource::class;

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
                        SpatieMediaLibraryImageEntry::make('user.profile_photo_path')
                            ->label(__('Profile Photo'))
                            ->collection('profile_photos')
                            ->defaultImageUrl(fn ($record) => $record->user->profile_photo_url)
                            ->size(250),
                        Group::make([
                            TextEntry::make('user.name')
                                ->label(__('Owner/Contact Person'))
                                ->icon('heroicon-o-user-circle')
                                ->iconColor('primary'),
                            TextEntry::make('name')
                                ->label(__('School Name'))
                                ->icon('heroicon-o-building-office-2')
                                ->iconColor('primary'),
                            TextEntry::make('type')
                                ->label(__('Type'))
                                ->icon('heroicon-o-viewfinder-circle')
                                ->iconColor('primary'),
                            TextEntry::make('website')
                                ->label(__('Website'))
                                ->icon('heroicon-o-globe')
                                ->iconColor('primary'),
                            TextEntry::make('email')
                                ->label(__('Email'))
                                ->icon('heroicon-o-envelope')
                                ->iconColor('primary'),
                            TextEntry::make('phone')
                                ->label(__('Phone'))
                                ->icon('heroicon-o-phone')
                                ->iconColor('primary'),
                            TextEntry::make('address')
                                ->label(__('Address'))
                                ->icon('heroicon-o-map-pin')
                                ->iconColor('primary'),
                            TextEntry::make('country')
                                ->label(__('Country'))
                                ->icon('heroicon-o-flag')
                                ->iconColor('primary'),
                            TextEntry::make('date_founded')
                                ->label(__('Date Founded'))
                                ->icon('heroicon-o-calendar')
                                ->iconColor('primary')
                                ->date(format: 'M d, Y'),
                            TextEntry::make('motto')
                                ->label(__('Slogan'))
                                ->icon('heroicon-o-light-bulb')
                                ->iconColor('primary'),
                            TextEntry::make('number_of_students')
                                ->label(__('Number of Students'))
                                ->icon('heroicon-o-chart-bar')
                                ->iconColor('primary'),
                            TextEntry::make('number_of_teachers')
                                ->label(__('Number of Teachers'))
                                ->icon('heroicon-o-chart-bar')
                                ->iconColor('primary'),
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
                                        ->tooltip(__('Rate this student'))
                                        ->fillForm(fn ($record): array => [
                                            $user = auth()->user(),
                                            'rating' => $record->reviews()->where('user_id', $user->id)->first()?->rating ?? 0,
                                            'comment' => $record->reviews()->where('user_id', $user->id)->first()?->comment ?? '',
                                        ])
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
                                            //users should not be able to rate themselves
                                            //                            dd($record->user_id, auth()->id());
                                            if ($record->user_id === auth()->id()) {
                                                Notification::make('Rating Error')
                                                    ->title('Rating Error')
                                                    ->danger()
                                                    ->body('You cannot rate yourself')
                                                    ->send();

                                                return;
                                            }
                                            //                            dd($data);
                                            if ($record->reviews()->where('user_id', auth()->id())->exists()) {
                                                $record->reviews()->where('user_id', auth()->id())->update([
                                                    'rating' => $data['rating'],
                                                    'comment' => $data['comment'],
                                                ]);
                                            } else {
                                                $review = new Review([
                                                    'rating' => $data['rating'],
                                                    'comment' => $data['comment'],
                                                    'reviewable_id' => $record->id,
                                                    'reviewable_type' => get_class($record),
                                                    'user_id' => auth()->id(),
                                                ]);
                                                $record->reviews()->save($review);
                                            }

                                            Notification::make('Rating Updated')
                                                ->title('Rating Updated')
                                                ->success()
                                                ->body('Rating has been updated successfully')
                                                ->send();
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
                    ->columnSpanFull(),
            ]);
    }
}
