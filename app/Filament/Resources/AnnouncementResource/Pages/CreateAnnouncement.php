<?php

namespace App\Filament\Resources\AnnouncementResource\Pages;

use App\Filament\Resources\AnnouncementResource;
use App\Models\User;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Facades\FilamentColor;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Layout;
use Rupadana\FilamentAnnounce\Announce;

class CreateAnnouncement extends CreateRecord
{
    protected static string $resource = AnnouncementResource::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->minLength(5)
                    ->required(),
                TextInput::make('title')
                    ->minLength(5)
                    ->required(),
                Textarea::make('body')
                    ->minLength(20)
                    ->required(),
                IconPicker::make('icon')
                    ->columns([
                        'default' => 1,
                        'lg' => 2,
                        '2xl' => 3,
                    ])
                    ->cacheDuration(60 * 60 * 24 * 7)
                    ->layout(Layout::FLOATING),
                Select::make('color')
                    ->options([
                        ...collect(FilamentColor::getColors())->map(fn ($value, $key) => ucfirst($key))->toArray(),
                        'custom' => 'Custom',
                    ])
                    ->live(),
                ColorPicker::make('custom_color')
                    ->hidden(fn (Get $get) => $get('color') != 'custom')
                    ->requiredIf('color', 'custom')
                    ->rgb(),

                Select::make('users')
                    ->options(['all' => 'all'] + User::all()->pluck('name', 'id')->toArray())
                    ->multiple()
                    ->required(),
            ]);
    }

    public function afterCreate()
    {
        $record = $this->getRecord();

        $color = $record->color;
        $custom_color = $record->custom_color;
        $icon = $record->icon;
        $title = $record->title;
        $body = $record->body;

        $isNotifyToAll = in_array('all', $record->users);

        $users = $isNotifyToAll ? User::all() : User::query()->whereIn('id', $record->users)->get();

        $announce = Announce::make();

        if ($title) {
            $announce->title($title);
        }
        if ($body) {
            $announce->body($body);
        }
        if ($icon) {
            $announce->icon($icon);
        }

        if ($color && $color == 'custom') {
            $announce->color(str($custom_color)->remove('rgb(')->remove(')'));
        } else {
            $announce->color(FilamentColor::getColors()[$color]['500']);
        }

        $announce->announceTo($users);
    }
}
