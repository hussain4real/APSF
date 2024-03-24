<?php

namespace App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource\Pages;

use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateTrainingProvider extends CreateRecord
{
    protected static string $resource = TrainingProviderResource::class;

    public static function getInstitutionNameFormField(): TextInput
    {
        return TextInput::make('institution_name')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getInstitutionTypeFormField(): TextInput
    {
        return TextInput::make('institution_type')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getInstitutionAddressFormField(): TextInput
    {
        return TextInput::make('institution_address')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getInstitutionPhoneFormField(): TextInput
    {
        return TextInput::make('institution_phone')
            ->translateLabel()
            ->tel()
            ->required()
            ->maxLength(255);
    }

    public static function getInstitutionEmailFormField(): TextInput
    {
        return TextInput::make('institution_email')
            ->translateLabel()
            ->email()
            ->required()
            ->maxLength(255);
    }

    public static function getInstitutionWebsiteFormField(): TextInput
    {
        return TextInput::make('institution_website')
            ->translateLabel()
            ->url()
            ->maxLength(255);
    }

    public static function getInstitutionDescriptionFormField(): TextInput
    {
        return TextInput::make('institution_description')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getInstitutionLicenseFormField(): TextInput
    {
        return TextInput::make('institution_license')
            ->translateLabel()
            ->maxLength(255);
    }

    public static function getInstitutionLicenseExpFormField(): DatePicker
    {
        return DatePicker::make('institution_license_expiry_date')
            ->translateLabel()
            ->native(false)
            ->placeholder('YYYY-MM-DD');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getInstitutionNameFormField(),
                static::getInstitutionTypeFormField(),
                static::getInstitutionAddressFormField(),
                static::getInstitutionPhoneFormField(),
                static::getInstitutionEmailFormField(),
                static::getInstitutionWebsiteFormField(),
                static::getInstitutionDescriptionFormField(),
                static::getInstitutionLicenseFormField(),
                static::getInstitutionLicenseExpFormField(),
            ]);
    }
}
