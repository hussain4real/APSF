<?php

namespace App\Filament\Clusters\Founders\Resources\FounderResource\Pages;

use App\Filament\Clusters\Founders\Resources\FounderResource;
use App\Models\Founder;
use App\Models\Review;
use App\Models\User;
use Chatify\Facades\ChatifyMessenger;
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
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Mokhosh\FilamentRating\Components\Rating;
use Mokhosh\FilamentRating\Entries\RatingEntry;

class ViewFounder extends ViewRecord
{
    protected static string $resource = FounderResource::class;

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
                            SpatieMediaLibraryImageEntry::make('user.profile_photo_path')
                                ->label(__('Profile Photo'))
                                ->collection('profile_photos')
                                ->defaultImageUrl(fn ($record) => $record->user->profile_photo_url)
                                ->size(300)
                                ->alignment(Alignment::Center)
                                ->extraImgAttributes([
                                    'class' => 'rounded-lg shadow-md object-cover object-center',
                                    'alt' => 'Profile Photo',
                                    'loading' => 'lazy',
                                ]),
                            Group::make([
                                TextEntry::make('user.name')
                                    ->label(__('Name'))
                                    ->icon('heroicon-o-user-circle')
                                    ->iconColor('primary'),
                                TextEntry::make('user.email')
                                    ->label(__('Email'))
                                    ->icon('heroicon-o-envelope')
                                    ->iconColor('primary'),
                                TextEntry::make('school_phone')
                                    ->label(__('Phone'))
                                    ->icon('heroicon-o-phone')
                                    ->iconColor('primary')
                                    ->placeholder('No Phone Provided'),
                            ]),
                        ])
                            ->columns(2),

                        Group::make([

                            TextEntry::make('school_name')
                                ->label(__('School Name'))
                                ->icon('heroicon-o-building-office-2')
                                ->iconColor('primary')
                                ->placeholder('No School Name Provided'),

                            TextEntry::make('school_address')
                                ->label(__('Address'))
                                ->icon('heroicon-o-map-pin')
                                ->iconColor('primary')
                                ->placeholder('No Address Provided'),
                            TextEntry::make('school_country')
                                ->label(__('Country'))
                                ->icon('heroicon-o-flag')
                                ->iconColor('primary')
                                ->placeholder('No Country Provided'),
                        ])
                            ->columns(2),
                    ]),
                    Group::make([
                        Section::make([
                            // ViewEntry::make('rating')
                            //     ->view('infolists.components.rating-review')
                            //     ->label(__('Rating'))
                            //     ->registerActions([
                            //         Action::make('rate')
                            //             ->icon('heroicon-o-arrows-up-down')
                            //             ->hiddenLabel()
                            //             ->color(Color::Yellow)
                            //             ->link()
                            //             ->tooltip(__('Rate this founder'))
                            //             ->fillForm(fn ($record): array => [
                            //                 $user = auth()->user(),
                            //                 'rating' => $record->reviews()->where('user_id', $user->id)->first()?->rating ?? 0,
                            //                 'comment' => $record->reviews()->where('user_id', $user->id)->first()?->comment ?? '',
                            //             ])
                            //             ->form([
                            //                 Rating::make('rating')
                            //                     ->stars(5)
                            //                     ->allowZero(true)
                            //                     ->color('warning'),
                            //                 Textarea::make('comment')
                            //                     ->label(__('Comment'))
                            //                     ->placeholder('Enter your comment here'),
                            //             ])
                            //             ->action(function (array $data, Model $record): void {
                            //                 //entities should not be able to rate themselves
                            //                 //                            dd($record->user_id, auth()->id());
                            //                 if ($record->user_id === auth()->id()) {
                            //                     Notification::make('Rating Error')
                            //                         ->title('Rating Error')
                            //                         ->danger()
                            //                         ->body('You cannot rate yourself')
                            //                         ->send();

                            //                     return;
                            //                 }
                            //                 //                            dd($data);
                            //                 if ($record->reviews()->where('user_id', auth()->id())->exists()) {
                            //                     $record->reviews()->where('user_id', auth()->id())->update([
                            //                         'rating' => $data['rating'],
                            //                         'comment' => $data['comment'],
                            //                     ]);
                            //                 } else {
                            //                     $review = new Review([
                            //                         'rating' => $data['rating'],
                            //                         'comment' => $data['comment'],
                            //                         'reviewable_id' => $record->id,
                            //                         'reviewable_type' => get_class($record),
                            //                         'user_id' => auth()->id(),
                            //                     ]);
                            //                     $record->reviews()->save($review);
                            //                 }

                            //                 Notification::make('Rating Updated')
                            //                     ->title('Rating Updated')
                            //                     ->success()
                            //                     ->body('Rating has been updated successfully')
                            //                     ->send();
                            //             }),
                            //         Action::make('view_reviews')
                            //             ->hiddenLabel()
                            //             ->tooltip(__('View reviews'))
                            //             ->icon('heroicon-o-eye')
                            //             ->link()
                            //             ->infolist(function (Infolist $infolist): Infolist {
                            //                 return $infolist
                            //                     ->record($this->record)
                            //                     ->schema([
                            //                         Section::make([
                            //                             RepeatableEntry::make('reviews')
                            //                                 ->state(function ($record) {
                            //                                     return $record->reviews;
                            //                                 })
                            //                                 ->label(__('Reviews'))
                            //                                 ->grid([
                            //                                     'sm' => 2,
                            //                                     'lg' => 3,
                            //                                 ])
                            //                                 ->columnSpanFull()
                            //                                 ->schema([
                            //                                     TextEntry::make('rating')
                            //                                         ->label(__('Rating'))
                            //                                         ->badge()
                            //                                         ->color(function ($record) {
                            //                                             $rating = floor($record->rating);
                            //                                             switch ($rating) {
                            //                                                 case 1:
                            //                                                     return Color::Red;
                            //                                                 case 2:
                            //                                                     return Color::Orange;
                            //                                                 case 3:
                            //                                                     return Color::Yellow;
                            //                                                 case 4:
                            //                                                 case 5:
                            //                                                     return Color::Green;
                            //                                                 default:
                            //                                                     return Color::Gray;
                            //                                             }
                            //                                         }),
                            //                                     TextEntry::make('comment')
                            //                                         ->label(__('Review')),
                            //                                     TextEntry::make('user.name')
                            //                                         ->label(__('Reviewer')),
                            //                                 ]),
                            //                         ])
                            //                             ->description(__('Reviews for this student'))
                            //                             ->icon('heroicon-o-star')
                            //                             ->iconColor('info')
                            //                             ->collapsible(),
                            //                     ]);
                            //             })
                            //             ->modalSubmitAction(false)
                            //             ->modalCancelActionLabel(__('Close')),
                            //     ]),
                            // RatingEntry::make('rating')
                                // ->label(__('Rating'))
                                // ->state(function ($record) {
                                //     return $record->rating;
                                // })
                                // ->color('warning'),
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
                            TextEntry::make('chat')
                                ->label(__('Chat'))
                                ->hiddenLabel()
                                ->default('Chat')
                                ->prefixAction(
                                    Action::make('chat')
                                        ->icon('heroicon-o-chat-bubble-left-right')
                                        ->hiddenLabel()
                                        ->color(Color::Blue)
                                        ->link()
                                        ->tooltip(__('Chat with this founder'))
                                        ->url('/chat/'.$this->record->user_id)
                                    // ->modalContent(function (Founder $record): View {
                                    //     $id = $record->user_id;
                                    //     $messengerColor = Auth::user()->messenger_color;
                                    //     $darkMode = Auth::user()->dark_mode < 1 ? 'light' : 'dark';
                                    //     return view('Chatify::pages.app', [
                                    //         'id' => $id ?? 0,
                                    //         'messengerColor' => $messengerColor ? $messengerColor : ChatifyMessenger::getFallbackColor(),
                                    //         'dark_mode' => $darkMode,
                                    // ]);
                                    // })
                                ),
                        ]),
                    ])
                        ->grow(false),
                ])
                    ->from('md')
                    ->columnSpanFull(),
            ]);
    }
}
