<?php

namespace App\Filament\Clusters\Members\Resources\UserResource\Pages;

use App\Filament\Clusters\Members\Resources\UserResource;
use App\Models\User;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\IconPosition;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Mokhosh\FilamentRating\Columns\RatingColumn;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // protected function getTableQuery(): ?Builder
    // {
    //     return User::query()->withoutGlobalScopes([
    //         \App\Models\Scopes\MemberScope::class,
    //     ]);
    // }
    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    View::make('users.table.profile')
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
                            TextColumn::make('created_at')
                                ->label(__('Created'))
                                ->date(format: 'M d, Y')
                                ->badge()
                                ->tooltip('Date of account creation')
                                ->icon('heroicon-o-calendar-days')
                                ->color('primary')
                                ->sortable()
                                ->alignCenter(),
                            TextColumn::make('status')
                                ->badge()
                                ->alignCenter()
                                ->extraAttributes([
                                    'class' => 'mt-2',
                                ]),
                            RatingColumn::make('rating')
                                ->label(__('Rating'))
                                ->state(function (Model $record) {
                                    return $record->rating;
                                })
                                ->size('sm')
                                ->color('warning')
                                ->alignCenter()
                                ->allowZero(),
                        ])
                        ->collapsed(),

                ])
                    ->alignment(Alignment::Start),
            ])
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
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
