<?php

namespace App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource\Pages;

use App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateEducationalConsultant extends CreateRecord
{
    protected static string $resource = EducationalConsultantResource::class;

    public static function getQualificationFormField(): TextInput
    {
        return TextInput::make('qualification')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getYearsOfExperienceFormField(): TextInput
    {
        return TextInput::make('years_of_experience')
            ->translateLabel()
            ->integer()
            ->required()
            ->maxLength(50);
    }

    public static function getSpecializationFormField(): TextInput
    {
        return TextInput::make('specialization')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getPhoneNumberFormField(): TextInput
    {
        return TextInput::make('phone_number')
            ->label(__('Phone Number'))
            ->placeholder('+123-4566-7890')
            ->prefixIcon('heroicon-o-phone')
            ->prefixIconColor('primary')
            ->required();
    }

    public static function getAddressFormField(): TextInput
    {
        return TextInput::make('address')
            ->label(__('Address'))
            ->placeholder(__('123 Main St'))
            ->prefixIcon('heroicon-o-map-pin')
            ->prefixIconColor('primary')
            ->maxLength(255);
    }

    public static function getCityFormField(): TextInput
    {
        return TextInput::make('city')
            ->translateLabel()
            ->placeholder('Doha')
            ->maxLength(255);
    }

    public static function getStateFormField(): TextInput
    {
        return TextInput::make('state')
            ->translateLabel()
            ->placeholder('Ad Dawha')
            ->maxLength(255);
    }

    public static function getCountryFormField(): TextInput
    {
        return TextInput::make('country')
            ->label(__('Country'))
            ->placeholder('Qatar')
            ->required()
            ->maxLength(255);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getQualificationFormField(),
                static::getYearsOfExperienceFormField(),
                static::getSpecializationFormField(),
                static::getPhoneNumberFormField(),
                static::getAddressFormField(),
                static::getCityFormField(),
                static::getStateFormField(),
                static::getCountryFormField(),
            ]);

    }
}
