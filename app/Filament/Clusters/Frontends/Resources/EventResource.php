<?php

namespace App\Filament\Clusters\Frontends\Resources;

use App\Filament\Clusters\Frontends;
use App\Filament\Clusters\Frontends\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Pages\SubNavigationPosition;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;

class EventResource extends Resource
{
    use Translatable;

    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $cluster = Frontends::class;

    protected static SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?int $navigationSort = 7;

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Frontends\Resources\EventResource\Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'view' => Frontends\Resources\EventResource\Pages\ViewEvent::route('/{record}'),
            'edit' => Frontends\Resources\EventResource\Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}
