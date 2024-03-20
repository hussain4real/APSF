<?php

namespace App\Filament\Clusters\Teachers\Resources\TeacherResource\Pages;

use App\Filament\Clusters\Teachers\Resources\TeacherResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    public static function getAddressFormField(): TextInput
    {
        return TextInput::make('address')
            ->maxLength(255);
    }

    public static function getSubjectTaughtFormField(): TextInput
    {
        return TextInput::make('subject_taught')
            ->maxLength(255);
    }

    public static function getQualificationFormField(): TextInput
    {
        return TextInput::make('qualification')
            ->maxLength(255);
    }

    public static function getDateOfBirthFormField(): DatePicker
    {
        return DatePicker::make('date_of_birth');
    }

    public static function getPreviousExperienceFormField(): TextInput
    {
        return TextInput::make('previous_experience')
            ->maxLength(255);
    }

    public static function getCountryFormField(): TextInput
    {
        return TextInput::make('country')
            ->maxLength(255);
    }

    public static function getPhoneFormField(): TextInput
    {
        return TextInput::make('phone')
            ->maxLength(255);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getAddressFormField(),
                static::getSubjectTaughtFormField(),
                static::getQualificationFormField(),
                static::getDateOfBirthFormField(),
                static::getPreviousExperienceFormField(),
                static::getCountryFormField(),
                static::getPhoneFormField(),
            ]);
    }
}
