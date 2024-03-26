<?php

namespace App\Filament\Clusters\Students\Resources\StudentResource\Pages;

use App\Filament\Clusters\Students\Resources\StudentResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    public static function getUserFormField(): Select
    {
        return Select::make('user_id')
            ->relationship('user', 'id')
            ->required();
    }

    public static function getSchoolNameFormField(): TextInput
    {
        return TextInput::make('school_name')
            ->label(__('School Name'))
            ->placeholder(__('ABC School'))
            ->required()
            ->maxLength(255);
    }

    public static function getCurrentGradeFormField(): TextInput
    {
        return TextInput::make('current_grade')
            ->label(__('Current Grade'))
            ->placeholder(__('Grade 1'))
            ->required()
            ->maxLength(255);
    }

    public static function getAddressFormField(): TextInput
    {
        return TextInput::make('address')
            ->label(__('Address'))
            ->placeholder(__('123 Main St'))
            ->maxLength(255);
    }

    public static function getDateOfBirthFormField(): DatePicker
    {
        return DatePicker::make('date_of_birth')
            ->label(__('Date of Birth'))
            ->placeholder(__('YYYY-MM-DD'))
            ->native(false)
            ->required();
    }

    public static function getCountryFormField(): TextInput
    {
        return TextInput::make('country')
            ->label(__('Country'))
            ->placeholder(__('Oman'))
            ->maxLength(255);
    }

    public static function getPhoneFormField(): TextInput
    {
        return TextInput::make('phone')
            ->label(__('Phone'))
            ->tel()
            ->placeholder(__('+1234567890'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getSchoolNameFormField(),
                static::getCurrentGradeFormField(),
                static::getAddressFormField(),
                static::getDateOfBirthFormField(),
                static::getCountryFormField(),
                static::getPhoneFormField(),
            ]);
    }
}
