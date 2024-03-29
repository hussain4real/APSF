<?php

namespace App\Filament\Clusters\Students\Resources\StudentResource\Pages;

use App\Filament\Clusters\Students\Resources\StudentResource;
use Filament\Actions;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Pages\ListRecords;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\Alignment;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Support\Carbon;

class ListStudents extends ListRecords
{
    protected static string $resource = StudentResource::class;

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
                    SpatieMediaLibraryImageColumn::make('user.profile_photo_path')
                        ->label(__('Profile Photo'))
                        ->collection('profile_photos')
                        ->size(100)
                        ->alignCenter()
                        ->circular()
                        ->defaultImageUrl(fn ($record) => $record->user->profile_photo_url)
                        ->extraAttributes([
                            'class' => 'my-4'
                        ]),

                    TextColumn::make('user.name')
                        ->label(__('Name'))
                        ->icon('heroicon-o-user-circle')
                        ->iconColor('primary')
                        ->alignCenter(),

                    TextColumn::make('school_name')
                        ->label(__('School Name'))
                        ->icon('heroicon-o-building-office-2')
                        ->iconColor('primary')
                        ->searchable()
                        ->alignCenter(),
                    TextColumn::make('current_grade')
                        ->label(__('Grade'))
                        ->icon('heroicon-o-academic-cap')
                        ->iconColor('primary')
                        ->searchable()
                        ->sortable()
                        ->alignCenter(),

                    TextColumn::make('user.email')
                        ->label(__('Email'))
                        ->icon('heroicon-o-envelope')
                        ->iconColor('primary')
                        ->alignCenter(),
                    TextColumn::make('country')
                        ->label(__('Country'))
                        ->icon('heroicon-o-globe-asia-australia')
                        ->iconColor('primary')
                        ->searchable()
                        ->alignCenter(),
                    TextColumn::make('phone')
                        ->label(__('Phone'))
                        ->icon('heroicon-o-phone')
                        ->iconColor('primary')
                        ->alignCenter(),
                    Split::make([
                        TextColumn::make('status')
                            ->badge(),
                        TextColumn::make('date_of_birth')
                            ->label(__('Date of Birth'))
                            ->date(format: 'M d, Y')
                            ->badge()
                            ->icon('heroicon-o-calendar-days')
                            ->color('primary')
                            ->sortable(),
                    ])
                    ->extraAttributes([
                        'class'=>'my-2'
                    ])

                ])
                    ->alignment(Alignment::Start),

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
                ])
                    ->button()
                    ->label(__('Actions'))
                    ->size(ActionSize::Small)
                    ->extraAttributes([
                        'class'=> 'ml-16 my-1'
                    ])
                    
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
