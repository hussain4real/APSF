<?php

namespace App\Filament\Clusters\Teachers\Resources\TeacherResource\Pages;

use App\Filament\Clusters\Teachers\Resources\TeacherResource;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Number;
use Illuminate\Validation\Rules\Password;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class CreateTeacher extends CreateRecord
{
    protected static string $resource = TeacherResource::class;

    public static function getUserSelectFormField(): Select
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
            ])
            ->disabled(fn():bool => auth()->user()->cannot('create', 'App\Models\User'));
    }

    public static function getSchoolNameSelectFormField(): Select
    {
        return Select::make('school_id')
            ->relationship('school', 'school_name')
            ->label(__('School'))
            ->hintColor('warning')
            ->hintIcon('heroicon-o-information-circle')
            ->hintIconTooltip(__('Select the school you are currently working. If your school is not listed, please enter the name of your school in the field below.'))
            ->hintAction(
                Action::make('more-info')
                ->label(__('More Info'))
                ->form([
                    Placeholder::make('hint')
                        ->label(__('Hint'))
                        ->content(
                            __('Select the school you are currently working. If your school is not listed, please enter the name of your school in the field below.')
                        )
                ])
                ->modalSubmitAction(false)
            )
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
            ->placeholder(__('+1234567890'))
            ->required();
    }

    public static function getUploadCVFormField(): SpatieMediaLibraryFileUpload
    {
        return SpatieMediaLibraryFileUpload::make('cv')
            ->label(__('Upload CV'))
            ->collection('cv')
            ->maxSize(5024)
            ->getUploadedFileNameForStorageUsing(
                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                    ->prepend(auth()->user()->name . '/cv/')
            )
            ->hint(__('Maximum size: ' . Number::fileSize(1024 * 1000 * 5) . ' bytes.'))
            ->hintIcon('heroicon-o-information-circle')
            ->hintColor('warning')
            ->hintIconTooltip(__('Upload your CV in PDF format.'))
            ->previewable()
            ->openable()
            // ->downloadable()
            ->moveFiles()
            ->conversion('thumb')
            ->acceptedFileTypes(['application/pdf'])
            ->uploadingMessage(__('uploading, please wait...'))
            ->columnSpanFull();
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
                static::getUploadCVFormField(),
            ]);
    }
}
