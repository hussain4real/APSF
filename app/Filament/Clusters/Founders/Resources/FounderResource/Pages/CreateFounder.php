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
        return TextInput::make('company_name')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyWebsiteFormField(): TextInput
    {
        return TextInput::make('company_website')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getCompanyPhoneFormField(): TextInput
    {
        return TextInput::make('company_phone')
            ->translateLabel()
            ->tel()
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyAddressFormField(): TextInput
    {
        return TextInput::make('company_address')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyCityFormField(): TextInput
    {
        return TextInput::make('company_city')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getCompanyStateFormField(): TextInput
    {
        return TextInput::make('company_state')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getCompanyCountryFormField(): TextInput
    {
        return TextInput::make('company_country')
            ->translateLabel()
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
