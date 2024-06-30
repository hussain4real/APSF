<?php

namespace App\Filament\Clusters\Contractors\Resources\ContractorResource\Pages;

use App\Filament\Clusters\Contractors\Resources\ContractorResource;
use App\Status;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class CreateContractor extends CreateRecord
{
    protected static string $resource = ContractorResource::class;


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
            ->disabled(fn():bool => auth()->user()->cannot('create', 'App\Models\Contractor'));
    }


    public static function getBusinessNameFormField(): TextInput
    {
        return TextInput::make('business_name')
            ->label(__('Business Name'))
            ->placeholder(__('ABC Company'))
            ->required()
            ->maxLength(255);
    }

    public static function getBusinessTypeFormField(): TextInput
    {
        return TextInput::make('business_type')
            ->label(__('Type'))
            ->placeholder(__('Construction'))
            ->maxLength(255);
    }

    public static function getBusinessAddressFormField(): TextInput
    {
        return TextInput::make('business_address')
            ->label(__('Address'))
            ->placeholder(__('123 Main St'))
            ->maxLength(255);
    }

    public static function getBusinessPhoneFormField(): TextInput
    {
        return TextInput::make('business_phone')
            ->label(__('Phone'))
            ->required()
            ->prefixIcon('heroicon-o-phone')
            ->prefixIconColor('primary')
            ->placeholder('+123-4566-7890');
    }

    public static function getBusinessEmailFormField(): TextInput
    {
        return TextInput::make('business_email')
            ->label(__('Email'))
            ->email()
            ->prefixIcon('heroicon-o-at-symbol')
            ->prefixIconColor('primary')
            ->placeholder('info@abc.com')
            ->maxLength(200);
    }

    public static function getBusinessWebsiteFormField(): TextInput
    {
        return TextInput::make('business_website')
            ->label(__('Website'))
            ->prefix('https://')
            ->prefixIcon('heroicon-o-globe-alt')
            ->prefixIconColor('primary')
            ->placeholder('abc.com')
            ->maxLength(255);
    }

    public static function getBusinessDescriptionFormField(): TextInput
    {
        return TextInput::make('business_description')
            ->label(__('Description'))
            ->maxLength(255);
    }

    public static function getBusinessLicenseFormField(): TextInput
    {
        return TextInput::make('business_license')
            ->label(__('License'))
            ->maxLength(255);
    }

    public static function getBusinessLicenseExpFormField(): DatePicker
    {
        return DatePicker::make('business_license_exp')
            ->label(__('License Expiry'))
            ->native(false)
            ->placeholder('MM/DD/YYYY');
    }
    public static function getStatusFormField(): Select
    {
        return Select::make('status')
            ->options([
                Status::class
            ])
            ->default(Status::PENDING)
            ->visibleOn(EditContractor::class);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                static::getStatusFormField(),
                static::getUserSelectFormField(),
                static::getBusinessNameFormField(),
                static::getBusinessTypeFormField(),
                static::getBusinessAddressFormField(),
                static::getBusinessPhoneFormField(),
                static::getBusinessEmailFormField(),
                static::getBusinessWebsiteFormField(),
                static::getBusinessDescriptionFormField(),
                static::getBusinessLicenseFormField(),
                static::getBusinessLicenseExpFormField(),
            ]);
    }
}
