<?php

namespace App\Filament\Clusters\Teachers\Resources\TeacherResource\Pages;

use App\Filament\Clusters\Teachers\Resources\TeacherResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    public function getUserSelectFormField(): Select
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
            ->required()
            ->maxLength(255);
    }

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
                static::getUserSelectFormField(),
                static::getSchoolNameSelectFormField()
                    ->live(onBlur: true),
                static::getSchoolNameFormField()
                    ->hidden(function (Get $get) {
                        return $get('school_id') !== null;

                    }),
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
