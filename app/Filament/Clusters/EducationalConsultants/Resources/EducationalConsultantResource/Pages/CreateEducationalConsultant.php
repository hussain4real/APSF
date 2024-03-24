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
            ->maxLength(255);
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
            ->translateLabel()
            ->tel()
            ->required()
            ->maxLength(255);
    }

    public static function getAddressFormField(): TextInput
    {
        return TextInput::make('address')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getCityFormField(): TextInput
    {
        return TextInput::make('city')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getStateFormField(): TextInput
    {
        return TextInput::make('state')
            ->translateLabel()
            ->required()
            ->maxLength(255);
    }

    public static function getCountryFormField(): TextInput
    {
        return TextInput::make('country')
            ->translateLabel()
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
