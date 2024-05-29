<?php

namespace App\Filament\Clusters\Frontends\Resources\MembershipResource\Pages;

use App\Filament\Clusters\Frontends\Resources\MembershipResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateMembership extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = MembershipResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, Get $get) {
                        return $set('slug', Str::slug($get('name')));
                    }),
                TextInput::make('slug')
                    ->maxLength(255),
                TextInput::make('price')
                    ->maxLength(255),
                Repeater::make('benefits')
                    ->schema([
                        Textarea::make('benefit')
                            ->required()
                            ->maxLength(400),

                    ])

                    ->collapsible()
                    ->columnSpanFull(),
            ]);
    }
}
