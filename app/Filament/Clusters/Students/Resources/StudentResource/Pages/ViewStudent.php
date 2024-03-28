<?php

namespace App\Filament\Clusters\Students\Resources\StudentResource\Pages;

use App\Filament\Clusters\Students\Resources\StudentResource;
use Faker\Provider\ar_EG\Text;
use Filament\Actions;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\SpatieMediaLibraryImageEntry;
use Filament\Infolists\Components\Split;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Pages\ViewRecord;
use Filament\Support\Colors\Color;

class ViewStudent extends ViewRecord
{
    protected static string $resource = StudentResource::class;

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
                                ->label(__('Name'))
                                ->icon('heroicon-o-user-circle')
                                ->iconColor('primary'),
                            TextEntry::make('school_name')
                                ->label(__('School Name'))
                                ->icon('heroicon-o-building-office-2')
                                ->iconColor('primary'),
                            TextEntry::make('current_grade')
                                ->label(__('Grade'))
                                ->icon('heroicon-o-academic-cap')
                                ->iconColor('primary'),
                            TextEntry::make('user.email')
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
                            TextEntry::make('date_of_birth')
                                ->label(__('Date of Birth'))
                                ->icon('heroicon-o-calendar')
                                ->iconColor('primary')
                                ->date(format: 'M d, Y')
                        ])
                            ->columns(2),
                    ]),
                    Group::make([
                        Section::make([
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
                        ])
                    ])
                        ->grow(false),
                ])
                    ->columnSpanFull(),
            ]);
    }
}
