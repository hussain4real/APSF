<?php

namespace App\Filament\Resources\AnnouncementResource\Pages;

use App\Filament\Resources\AnnouncementResource;
use App\Models\User;
use Filament\Actions;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Facades\FilamentColor;
use Guava\FilamentIconPicker\Forms\IconPicker;

class EditAnnouncement extends EditRecord
{
    protected static string $resource = AnnouncementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    //    public function form(Form $form): Form
    //    {
    //        return $form
    //            ->schema([
    //                TextInput::make('name')
    //                    ->minLength(5)
    //                    ->required(),
    //                TextInput::make('title')
    //                    ->minLength(5)
    //                    ->required(),
    //                Textarea::make('body')
    //                    ->minLength(20)
    //                    ->required(),
    //                IconPicker::make('icon')
    //                    ->preload(),
    //                Select::make('color')
    //                    ->options([
    //                        ...collect(FilamentColor::getColors())->map(fn ($value, $key) => ucfirst($key))->toArray(),
    //                        'custom' => 'Custom',
    //                    ])
    //                    ->live(),
    //                ColorPicker::make('custom_color')
    //                    ->hidden(fn (Get $get) => $get('color') != 'custom')
    //                    ->requiredIf('color', 'custom')
    //                    ->rgb(),
    //
    //                Select::make('users')
    //                    ->options(['all' => 'all'] + User::all()->pluck('name', 'id')->toArray())
    //                    ->multiple()
    //                    ->required(),
    //            ]);
    //    }
}
