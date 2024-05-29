<?php

namespace App\Filament\Clusters\Frontends\Resources\PublicVoteResource\Pages;

use App\Filament\Clusters\Frontends\Resources\PublicVoteResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreatePublicVote extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = PublicVoteResource::class;

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
                Textarea::make('question')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('option1')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('option2')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('option3')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
