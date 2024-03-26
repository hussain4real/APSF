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
            ->label(__('Address'))
            ->maxLength(255);
    }

    public static function getSubjectTaughtFormField(): TextInput
    {
        return TextInput::make('subject_taught')
            ->label(__('Subject Taught'))
            ->maxLength(255);
    }

    public static function getQualificationFormField(): TextInput
    {
        return TextInput::make('qualification')
            ->label(__('Qualification'))
            ->maxLength(255);
    }

    public static function getDateOfBirthFormField(): DatePicker
    {
        return DatePicker::make('date_of_birth')
            ->label(__('Date of Birth'))
            ->placeholder(__('YYYY-MM-DD'))
            ->native(false);
    }

    public static function getPreviousExperienceFormField(): TextInput
    {
        return TextInput::make('previous_experience')
            ->label(__('Previous Experience'))
            ->maxLength(255);
    }

    public static function getCountryFormField(): TextInput
    {
        return TextInput::make('country')
            ->label(__('Country'))
            ->maxLength(155);
    }

    public static function getPhoneFormField(): TextInput
    {
        return TextInput::make('phone')
            ->label(__('Phone Number'))
            ->tel()
            ->telRegex('/^\+\d{10,14}$/')
            ->placeholder(__('+1234567890'))
            ->required();
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
