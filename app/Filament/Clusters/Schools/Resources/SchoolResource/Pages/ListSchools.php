<?php

namespace App\Filament\Clusters\Schools\Resources\SchoolResource\Pages;

use App\Filament\Clusters\Schools\Resources\SchoolResource;
use App\Models\Review;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\TextColumn\TextColumnSize;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Components\Rating;

class ListSchools extends ListRecords
{
    protected static string $resource = SchoolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([

                Stack::make([
                    View::make('entities.table.profile')
                        ->components([
                            TextColumn::make('user.name')
                                ->label(__('Owner/Contact Person'))
                                ->alignCenter()
                                ->searchable()
                                ->size(TextColumnSize::Medium)
                                ->weight(FontWeight::SemiBold),
                            TextColumn::make('name')
                                ->label(__('School Name'))
                                ->icon('heroicon-o-building-office-2')
                                ->iconColor('primary')
                                ->searchable()
                                ->alignCenter()
                                ->color('gray')
                                ->weight(FontWeight::SemiBold),
                            TextColumn::make('type')
                                ->label(__('Type'))
                                ->icon('heroicon-o-viewfinder-circle')
                                ->iconColor('primary')
                                ->searchable()
                                ->sortable()
                                ->color('gray')
                                ->weight(FontWeight::Medium)
                                ->alignCenter(),

                            TextColumn::make('email')
                                ->label(__('Email'))
                                ->icon('heroicon-o-envelope')
                                ->iconColor('primary')
                                ->color('gray')
                                ->weight(FontWeight::Medium)
                                ->alignCenter(),
                            TextColumn::make('country')
                                ->label(__('Country'))
                                ->icon('heroicon-o-flag')
                                ->iconColor('primary')
                                ->searchable()
                                ->hidden()
                                ->alignCenter(),
                            TextColumn::make('phone')
                                ->label(__('Phone'))
                                ->icon('heroicon-o-phone')
                                ->iconColor('primary')
                                ->hidden()
                                ->alignCenter(),
                            Split::make([
                                TextColumn::make('date_founded')
                                    ->label(__('Date Founded'))
                                    ->date(format: 'M d, Y')
                                    ->badge()
                                    ->icon('heroicon-o-cake')
                                    ->color('primary')
                                    ->grow(true)
                                    ->sortable(),
                                TextColumn::make('status')
                                    ->badge()
                                    ->grow(false)
                                    ->alignCenter(),

                            ])
                                ->extraAttributes([
                                    'class' => 'mt-2',
                                ]),
                            RatingColumn::make('rating')
                                ->label(__('Rating'))
                                ->state(function (Model $record): string {
                                    return $record->rating;
                                })
                                ->color('warning')
                                ->size('sm')
                                ->alignCenter()
                                ->allowZero(),

                        ]),

                ])
                    ->alignment(Alignment::Center),

            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    Action::make('rate')
                        ->visible(fn (Model $record) => $record->user_id !== auth()->id())
                        ->icon('heroicon-o-star')
                        ->fillForm(fn (Model $record): array => [
                            $user = auth()->user(),
                            'rating' => $record->reviews()->where('user_id', $user->id)->first()?->rating ?? 0,
                            'comment' => $record->reviews()->where('user_id', $user->id)->first()?->comment ?? '',
                        ])
                        ->form([
                            Rating::make('rating')
                                ->stars(5)
                                ->allowZero(true),
                            Textarea::make('comment')
                                ->label(__('Comment'))
                                ->placeholder('Enter your comment here'),
                        ])
                        ->action(function (array $data, Model $record): void {
                            //entities should not be able to rate themselves
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

                ])
                    ->button()
                    ->label(__('Actions'))
                    ->size(ActionSize::Small)
                    ->extraAttributes([
                        'class' => 'ml-16 my-1',
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
}
