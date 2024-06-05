<?php

namespace App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource\Pages;

use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource;
use App\Models\Review;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\Alignment;
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
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Mokhosh\FilamentRating\Columns\RatingColumn;
use Mokhosh\FilamentRating\Components\Rating;

class ListTrainingProviders extends ListRecords
{
    protected static string $resource = TrainingProviderResource::class;

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
                    View::make('entities.table.training_provider')
                        ->components([
                            TextColumn::make('user.name')
                                ->label(__('Owner/Contact Person'))
                                ->searchable(),
                            TextColumn::make('institution_name')
                                ->label(__('Institution Name'))
                                ->searchable(),
                            TextColumn::make('institution_type')
                                ->label(__('Type'))
                                ->searchable()
                                ->sortable(),
                            TextColumn::make('institution_email')
                                ->label(__('Email')),
                            TextColumn::make('institution_address')
                                ->label(__('Address'))
                                ->searchable()
                                ->hidden(),
                            TextColumn::make('institution_phone')
                                ->label(__('Phone')),

                            TextColumn::make('status')
                                ->badge(),

                            //                            RatingColumn::make('rating')
                            //                                ->label(__('Rating'))
                            //                                ->state(function (Model $record): string {
                            //                                    return $record->rating;
                            //                                })
                            //                                ->color('warning')
                            //                                ->size('sm')
                            //                                ->alignCenter()
                            //                                ->allowZero()
                            //                                ->extraAttributes([
                            //                                    'class' => 'pt-4',
                            //                                ]),

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
                    ->extraAttributes([
                        'class' => 'ml-16',
                    ]),

            ]);
        //            ->bulkActions([
        //                BulkActionGroup::make([
        //                    DeleteBulkAction::make(),
        //                    ForceDeleteBulkAction::make(),
        //                    RestoreBulkAction::make(),
        //                ]),
        //            ]);
    }
}
