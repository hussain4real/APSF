<?php

namespace App\Filament\Clusters\Members\Resources\MemberResource\Pages;

use App\Filament\Clusters\Members\Resources\MemberResource;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Pages\CreateRecord;

class CreateMember extends CreateRecord
{
    protected static string $resource = MemberResource::class;

    public static function getPhoneNumberFormField(): TextInput
    {
        return TextInput::make('phone_number')
            ->label(__('Phone Number'))
            ->required()
            ->tel()
            ->prefixIcon('heroicon-o-phone')
            ->prefixIconColor('primary')
            ->placeholder('+123-4566-7890');
    }

    public static function getAddressFormField(): TextInput
    {
        return TextInput::make('address')
            ->label(__('Address'))
            ->prefixIcon('heroicon-o-map-pin')
            ->placeholder(__('123 Main St'))
            ->maxLength(255);
    }

    public static function getCityFormField(): TextInput
    {
        return TextInput::make('city')
            ->label(__('City'))
            ->prefixIcon('heroicon-o-location-marker')
            ->placeholder(__('Doha'))
            ->maxLength(255);

    }

    public static function getStateFormField(): TextInput
    {
        return TextInput::make('state')
            ->label(__('State'))
            ->prefixIcon('heroicon-o-location-marker')
            ->placeholder(__('Ad Dawhah (Doha)'))
            ->maxLength(255);
    }

    public static function getCountryFormField(): TextInput
    {
        return TextInput::make('country')
            ->label(__('Country'))
            ->prefixIcon('heroicon-o-map')
            ->placeholder(__('Qatar'))
            ->maxLength(255);
    }

    public static function getDateOfBirthFormField(): DatePicker
    {
        return DatePicker::make('date_of_birth')
            ->label(__('Date of Birth'))
            ->date()
            ->native(false)
            ->prefixIcon('heroicon-o-calendar')
            ->placeholder(__('YYYY-MM-DD'));
    }
}
