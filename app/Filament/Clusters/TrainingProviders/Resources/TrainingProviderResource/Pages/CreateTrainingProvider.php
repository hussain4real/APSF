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
            ->label(__('Institution Name'))
            ->placeholder(__('ABC Institution'))
            ->required()
            ->maxLength(255);
    }

    public static function getInstitutionTypeFormField(): TextInput
    {
        return TextInput::make('institution_type')
            ->label(__('Type'))
            ->placeholder(__('Vocational Training Center'))

            ->maxLength(255);
    }

    public static function getInstitutionAddressFormField(): TextInput
    {
        return TextInput::make('institution_address')
            ->label(__('Address'))
            ->placeholder(__('123 Main St'))
            ->prefixIcon('heroicon-o-map-pin')
            ->prefixIconColor('primary')
            ->maxLength(255);
    }

    public static function getInstitutionPhoneFormField(): TextInput
    {
        return TextInput::make('institution_phone')
            ->label(__('Phone Number'))
            ->placeholder('+12345667890')
//            ->tel()
//            ->minValue(12)
//            ->maxValue(12)
            //please check the number you've entered
            ->prefixIcon('heroicon-o-phone')
            ->prefixIconColor('primary')
            ->required();
    }

    public static function getInstitutionEmailFormField(): TextInput
    {
        return TextInput::make('institution_email')
            ->label(__('Email'))
            ->placeholder('info@abc.com')
            ->prefixIcon('heroicon-o-at-symbol')
            ->prefixIconColor('primary')
            ->email()
            ->required()
            ->maxLength(255);
    }

    public static function getInstitutionWebsiteFormField(): TextInput
    {
        return TextInput::make('institution_website')
            ->label(__('Website'))
            ->prefix('https://')
            ->placeholder('abc.com')
            ->prefixIcon('heroicon-o-globe-alt')
            ->prefixIconColor('primary')
            ->url()
            ->maxLength(255);
    }

    public static function getInstitutionDescriptionFormField(): TextInput
    {
        return TextInput::make('institution_description')
            ->label(__('Activities'))
            ->maxLength(255);
    }

    public static function getInstitutionLicenseFormField(): TextInput
    {
        return TextInput::make('institution_license')
            ->label(__('License'))
            ->maxLength(255);
    }

    public static function getInstitutionLicenseExpFormField(): DatePicker
    {
        return DatePicker::make('institution_license_expiry_date')
            ->label(__('Expiry Date'))
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
