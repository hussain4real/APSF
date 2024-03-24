<?php

namespace App\Filament\Clusters\Contractors\Resources\ContractorResource\Pages;

use App\Filament\Clusters\Contractors\Resources\ContractorResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateContractor extends CreateRecord
{
    protected static string $resource = ContractorResource::class;

    public static function getBusinessNameFormField(): TextInput
    {
        return TextInput::make('business_name')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getBusinessTypeFormField(): TextInput
    {
        return TextInput::make('business_type')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getBusinessAddressFormField(): TextInput
    {
        return TextInput::make('business_address')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getBusinessPhoneFormField(): TextInput
    {
        return TextInput::make('business_phone')
            ->translateLabel()
            ->tel()
            ->maxLength(255);
    }

    public static function getBusinessEmailFormField(): TextInput
    {
        return TextInput::make('business_email')
            ->translateLabel()
            ->email()
            ->maxLength(255);
    }

    public static function getBusinessWebsiteFormField(): TextInput
    {
        return TextInput::make('business_website')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getBusinessDescriptionFormField(): TextInput
    {
        return TextInput::make('business_description')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getBusinessLicenseFormField(): TextInput
    {
        return TextInput::make('business_license')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getBusinessLicenseExpFormField(): DatePicker
    {
        return DatePicker::make('business_license_exp')
            ->translateLabel()
            ->native(false)
            ->placeholder('MM/DD/YYYY');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getBusinessNameFormField(),
                static::getBusinessTypeFormField(),
                static::getBusinessAddressFormField(),
                static::getBusinessPhoneFormField(),
                static::getBusinessEmailFormField(),
                static::getBusinessWebsiteFormField(),
                static::getBusinessDescriptionFormField(),
                static::getBusinessLicenseFormField(),
                static::getBusinessLicenseExpFormField(),
            ]);
    }
}
