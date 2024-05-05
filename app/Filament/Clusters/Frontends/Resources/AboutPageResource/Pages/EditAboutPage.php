<?php

namespace App\Filament\Clusters\Frontends\Resources\AboutPageResource\Pages;

use App\Filament\Clusters\Frontends\Resources\AboutPageResource;
use Filament\Actions;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Colors\Color;

class EditAboutPage extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = AboutPageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make(),
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('About Page')
                    ->tabs([
                        Tab::make('Hero Section')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                TextInput::make('hero_title')
                                    ->label(__('Hero Title')),
                                Textarea::make('hero_description_one')
                                    ->label(__('First Description')),
                                Textarea::make('hero_description_two')
                                    ->label(__('Second Description')),
                                Textarea::make('hero_description_three')
                                    ->label(__('Third Description')),
                                Textarea::make('hero_description_four')
                                    ->label(__('Fourth Description')),
                            ]),
                        Tab::make('Objective Section')
                            ->icon('heroicon-o-paper-clip')
                            ->schema([
                                TextInput::make('objective_heading')
                                    ->label(__('Heading')),
                                Section::make('First Objective')
                                    ->description(__('Content for the first objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_one');
                                        $description = $get('objective_description_one');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_one')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_one')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Second Objective')
                                    ->description(__('Content for the second objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_two');
                                        $description = $get('objective_description_two');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_two')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_two')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Third Objective')
                                    ->description(__('Content for the third objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_three');
                                        $description = $get('objective_description_three');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_three')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_three')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Fourth Objective')
                                    ->description(__('Content for the fourth objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_four');
                                        $description = $get('objective_description_four');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_four')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_four')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Fifth Objective')
                                    ->description(__('Content for the fifth objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_five');
                                        $description = $get('objective_description_five');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_five')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_five')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Sixth Objective')
                                    ->description(__('Content for the sixth objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_six');
                                        $description = $get('objective_description_six');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_six')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_six')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Seventh Objective')
                                    ->description(__('Content for the seventh objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_seven');
                                        $description = $get('objective_description_seven');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_seven')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_seven')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Eighth Objective')
                                    ->description(__('Content for the eighth objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_eight');
                                        $description = $get('objective_description_eight');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_eight')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_eight')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Ninth Objective')
                                    ->description(__('Content for the ninth objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_nine');
                                        $description = $get('objective_description_nine');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_nine')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_nine')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Tenth Objective')
                                    ->description(__('Content for the tenth objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_ten');
                                        $description = $get('objective_description_ten');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_ten')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_ten')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                                Section::make('Eleventh Objective')
                                    ->description(__('Content for the eleventh objective'))
                                    ->icon('heroicon-o-paper-clip')
                                    ->iconColor(function (Get $get) {
                                        $title = $get('objective_title_eleven');
                                        $description = $get('objective_description_eleven');
                                        //if both are empty return red color
                                        if (! empty($title) && ! empty($description)) {
                                            return Color::Teal;
                                        }

                                        return Color::Orange;
                                    })
                                    ->schema([
                                        TextInput::make('objective_title_eleven')
                                            ->label(__('Title'))
                                            ->live(onBlur: true),
                                        Textarea::make('objective_description_eleven')
                                            ->label(__('Description'))
                                            ->live(onBlur: true),
                                    ])
                                    ->collapsed(),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
