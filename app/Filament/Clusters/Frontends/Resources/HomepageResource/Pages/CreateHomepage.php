<?php

namespace App\Filament\Clusters\Frontends\Resources\HomepageResource\Pages;

use App\Filament\Clusters\Frontends\Resources\HomepageResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Number;

class CreateHomepage extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = HomepageResource::class;

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
                Tabs::make('Homepage')
                    ->tabs([
                        Tab::make('Hero Section')
                            ->icon('heroicon-o-megaphone')
                            ->schema([
                                TextInput::make('seo_title')
                                    ->label(__('SEO Title')),
                                TextInput::make('hero_title')
                                    ->label(__('Hero Title')),
                                Textarea::make('hero_description_one')
                                    ->label(__('First Description')),
                                Textarea::make('hero_description_two')
                                    ->label(__('Second Description')),
                                SpatieMediaLibraryFileUpload::make('attachment')
                                    ->collection('hero_video')
                                    ->hiddenLabel()
                                    ->responsiveImages()
                                    ->maxSize(1024 * 1000 * 2)
                                    ->hint(__('Maximum size: '.Number::fileSize(1024 * 1000 * 1000 * 2).' bytes.'))
                                    ->hintIcon('heroicon-o-information-circle')
                                    ->hintColor('warning')
                                    ->imagePreviewHeight('150')
                                    ->openable()
                                    ->preserveFilenames()
                                    ->downloadable()
                                    ->imageEditor(2)
                                    ->imageEditorEmptyFillColor('#dda581')
                                    ->uploadingMessage(__('uploading, please wait...')),
                            ]),
                        Tab::make('Mission Section')
                            ->icon('heroicon-o-paper-clip')
                            ->schema([
                                TextInput::make('mission_title')
                                    ->label(__('Mission Title')),
                                Textarea::make('mission_description')
                                    ->label(__('Description')),
                            ]),
                        Tab::make('Vision Section')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                TextInput::make('vision_title')
                                    ->label(__('Vision Title')),
                                Textarea::make('vision_description')
                                    ->label(__('Description')),
                            ]),
                        Tab::make('Values Section')
                            ->icon('heroicon-o-check-circle')
                            ->schema([
                                TextInput::make('values_heading')
                                    ->label(__('Heading')),
                                Section::make('First Value')
                                    ->description(__('Content for the first value card.'))
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([

                                        TextInput::make('value_title_one')
                                            ->label(__('First Value Title')),
                                        Textarea::make('value_description_one')
                                            ->label(__('First Value Description')),
                                    ])
                                    ->collapsible(),
                                Section::make('Second Value')
                                    ->description(__('Content for the second value card.'))
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([
                                        TextInput::make('value_title_two')
                                            ->label(__('Second Value Title')),
                                        Textarea::make('value_description_two')
                                            ->label(__('Second Value Description')),
                                    ])
                                    ->collapsible(),
                                Section::make('Third Value')
                                    ->description(__('Content for the third value card.'))
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([
                                        TextInput::make('value_title_three')
                                            ->label(__('Third Value Title')),
                                        Textarea::make('value_description_three')
                                            ->label(__('Third Value Description')),
                                    ])
                                    ->collapsible(),
                                Section::make('Fourth Value')
                                    ->description(__('Content for the fourth value card.'))
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([
                                        TextInput::make('value_title_four')
                                            ->label(__('Fourth Value Title')),
                                        Textarea::make('value_description_four')
                                            ->label(__('Fourth Value Description')),
                                    ])
                                    ->collapsible(),
                                Section::make('Fifth Value')
                                    ->description(__('Content for the fifth value card.'))
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([
                                        TextInput::make('value_title_five')
                                            ->label(__('Fifth Value Title')),
                                        Textarea::make('value_description_five')
                                            ->label(__('Fifth Value Description')),
                                    ])
                                    ->collapsible(),
                                Section::make('Sixth Value')
                                    ->description(__('Content for the sixth value card.'))
                                    ->icon('heroicon-o-pencil-square')
                                    ->schema([
                                        TextInput::make('value_title_six')
                                            ->label(__('Sixth Value Title')),
                                        Textarea::make('value_description_six')
                                            ->label(__('Sixth Value Description')),
                                    ])
                                    ->collapsible(),

                            ]),
                        Tab::make('Chairman Message Section')
                            ->icon('heroicon-o-user')
                            ->schema([
                                TextInput::make('chairman_message_title')
                                    ->label(__('Chairman Message Title')),
                                Textarea::make('chairman_message_one')
                                    ->label(__('First Paragraph')),
                                Textarea::make('chairman_message_two')
                                    ->label(__('Second Paragraph')),
                                Textarea::make('chairman_message_three')
                                    ->label(__('Third Paragraph')),
                                SpatieMediaLibraryFileUpload::make('attachment')
                                    ->collection('chairman_images')
                                    ->hiddenLabel()
                                    ->responsiveImages()
                                    ->maxSize(1024 * 3)
                                    ->hint(__('Maximum size: 3MB.'))
                                    ->hintIcon('heroicon-o-information-circle')
                                    ->hintColor('warning')
                                    ->imagePreviewHeight('150')
                                    ->openable()
                                    ->preserveFilenames()
                                    ->downloadable()
                                    ->imageEditor(2)
                                    ->imageEditorEmptyFillColor('#dda581')
                                    ->uploadingMessage(__('uploading, please wait...')),
                            ]),
                        Tab::make('Partners Section')
                            ->icon('heroicon-o-users')
                            ->schema([
                                TextInput::make('partners_title')
                                    ->label(__('Partners Title')),
                                Textarea::make('partners_description')
                                    ->label(__('Description')),
                            ]),
                        Tab::make('Member Section')
                            ->icon('heroicon-o-user-group')
                            ->schema([
                                TextInput::make('member_action_text')
                                    ->label(__('Action Text')),
                                TextInput::make('member_action_url')
                                    ->label(__('Action URL')),
                                Textarea::make('member_description')
                                    ->label(__('Description')),
                            ]),
                        Tab::make('Newsletter Section')
                            ->icon('heroicon-o-envelope')
                            ->schema([
                                TextInput::make('newsletter_title')
                                    ->label(__('Newsletter Title')),
                                Textarea::make('newsletter_description')
                                    ->label(__('Description')),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
