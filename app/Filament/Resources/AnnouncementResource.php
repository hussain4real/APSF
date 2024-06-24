<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnnouncementResource\Pages;
use Filament\Resources\Resource;
use Rupadana\FilamentAnnounce\Models\Announcement;

class AnnouncementResource extends Resource
{
    protected static ?string $model = Announcement::class;

    protected static ?string $navigationIcon = 'heroicon-o-megaphone';

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getNavigationLabel(): string
    {
        return __('announcements');
    }

    public static function getModelLabel(): string
    {
        return __('announcement');
    }

    public static function getPluralModelLabel(): string
    {
        return __('announcements');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAnnouncements::route('/'),
            'create' => Pages\CreateAnnouncement::route('/create'),
            'edit' => Pages\EditAnnouncement::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        if (auth()->user()->hasRole('admin') || auth()->user()->hasRole('super_admin')){
            return true;
        }
        return false;
    }
}
