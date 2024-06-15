<?php

namespace App\Filament\Clusters\Students\Resources\StudentResource\Pages;

use App\Filament\Clusters\Students\Resources\StudentResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CreateStudent extends CreateRecord
{
    protected static string $resource = StudentResource::class;

    public static function getUserFormField(): Select
    {
        return Select::make('user_id')
            ->relationship('user', 'name')
            ->required()
            ->searchable()
            ->preload()
            ->createOptionForm([
                TextInput::make('first_name')
                    ->required(),
                TextInput::make('last_name')
                    ->required(),
                TextInput::make('email')
                    ->required()
                    ->email(),
                TextInput::make('password')
                    ->label(__('filament-panels::pages/auth/register.form.password.label'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required()
                    ->rule(Password::default())
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->same('passwordConfirmation'),
                TextInput::make('passwordConfirmation')
                    ->label(__('filament-panels::pages/auth/register.form.password_confirmation.label'))
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required()
                    ->dehydrated(false),
            ]);
    }

    public static function getSchoolNameSelectFormField(): Select
    {
        return Select::make('school_id')
            ->relationship('school', 'school_name')
            ->label(__('School Name'))
            ->searchable()
            ->preload();
    }

    public static function getSchoolNameFormField(): TextInput
    {
        return TextInput::make('school_name')
            ->label(__('School Name'))
            ->placeholder(__('ABC School'))
            ->required(function (Get $get) {
                return $get('school_id') === null;
            })
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
            ->placeholder(__('+1234567890'));
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getUserFormField(),
                static::getSchoolNameSelectFormField()
                    ->live(onBlur: true),
                static::getSchoolNameFormField()
                    ->hidden(function (Get $get) {
                        return $get('school_id') !== null;

                    }),
                static::getCurrentGradeFormField(),
                static::getAddressFormField(),
                static::getDateOfBirthFormField(),
                static::getCountryFormField(),
                static::getPhoneFormField(),
            ]);
    }
}
