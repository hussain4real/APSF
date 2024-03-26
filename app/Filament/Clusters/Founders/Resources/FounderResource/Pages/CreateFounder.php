<?php

namespace App\Filament\Clusters\Founders\Resources\FounderResource\Pages;

use App\Filament\Clusters\Founders\Resources\FounderResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateFounder extends CreateRecord
{
    protected static string $resource = FounderResource::class;

    public static function getCompanyNameFormField(): TextInput
    {
        return TextInput::make('school_name')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyWebsiteFormField(): TextInput
    {
        return TextInput::make('school_website')
            ->label(__('Website'))
            ->maxLength(255);
    }

    public static function getCompanyPhoneFormField(): TextInput
    {
        return TextInput::make('school_phone')
            ->label(__('Phone'))
            ->tel()
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyAddressFormField(): TextInput
    {
        return TextInput::make('school_address')
            ->label(__('Address'))
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyCityFormField(): TextInput
    {
        return TextInput::make('school_city')
            ->label(__('City'))
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyStateFormField(): TextInput
    {
        return TextInput::make('school_state')
            ->label(__('State'))
            ->maxLength(255);
    }

    public static function getCompanyCountryFormField(): TextInput
    {
        return TextInput::make('school_country')
            ->label(__('Country'))
            ->required()
            ->maxLength(255);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getCompanyNameFormField(),
                static::getCompanyWebsiteFormField(),
                static::getCompanyPhoneFormField(),
                static::getCompanyAddressFormField(),
                static::getCompanyCityFormField(),
                static::getCompanyStateFormField(),
                static::getCompanyCountryFormField(),
            ]);
    }
}
