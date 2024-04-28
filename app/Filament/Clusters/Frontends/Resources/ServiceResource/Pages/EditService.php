<?php

namespace App\Filament\Clusters\Frontends\Resources\ServiceResource\Pages;

use App\Filament\Clusters\Frontends\Resources\ServiceResource;
use Filament\Actions;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditService extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = ServiceResource::class;

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
                RichEditor::make('service_side_title')
                    ->label(__('Service Side Title'))
                    ->required(),
                TextInput::make('service_title')
                    ->label(__('Service Title'))
                    ->required(),
                Textarea::make('service_description')
                    ->label(__('Service Description'))
                    ->required(),
                TextInput::make('service_tag_one')
                    ->label(__('Service Tag One')),
                TextInput::make('service_tag_two')
                    ->label(__('Service Tag Two')),
                TextInput::make('service_tag_three')
                    ->label(__('Service Tag Three')),
                TextInput::make('service_tag_four')
                    ->label(__('Service Tag Four')),
                TextInput::make('service_tag_five')
                    ->label(__('Service Tag Five')),
            ]);
    }
}
