<?php

namespace App\Filament\Clusters\Frontends\Resources\EventResource\Pages;

use App\Filament\Clusters\Frontends\Resources\EventResource;
use Filament\Actions;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditEvent extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('event_title')
                    ->label(__('Event Name'))
                    ->required(),
                Textarea::make('event_description')
                    ->label(__('Event Description')),
                DatePicker::make('event_date')
                    ->label(__('Event Date'))
                    ->native(false)
                    ->placeholder('MM/DD/YYYY')
                    ->date(true),
                TimePicker::make('event_time')
                    ->label(__('Event Time'))
                    ->native(false)
                    ->seconds(false)
                    ->placeholder('HH:MM')
                    ->time(true),
                TextInput::make('event_location')
                    ->label(__('Event Location')),

            ]);
    }
}
