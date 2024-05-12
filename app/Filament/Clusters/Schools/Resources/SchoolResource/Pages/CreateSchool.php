<?php

namespace App\Filament\Clusters\Schools\Resources\SchoolResource\Pages;

use App\Filament\Clusters\Schools\Resources\SchoolResource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateSchool extends CreateRecord
{
    protected static string $resource = SchoolResource::class;

    public static function getUserFormField(): Select
    {
        return Select::make('user_id')
            ->label(__('Contact Person'))
            ->relationship('user', 'id')
            ->required();
    }

    public static function getNameFormField(): TextInput
    {
        return TextInput::make('school_name')
            ->label(__('Name'))
            ->required()
            ->maxLength(255);
    }

    public static function getSlugFormField(): TextInput
    {
        return TextInput::make('slug')
            ->label(__('Slug'))
            ->maxLength(255);
    }

    public static function getDescriptionFormField(): TextInput
    {
        return TextInput::make('description')
            ->label(__('Description'))
            ->maxLength(255);
    }

    public static function getAddressFormField(): TextInput
    {
        return TextInput::make('address')
            ->label(__('Address'))
            ->maxLength(255);
    }

    public static function getCityFormField(): TextInput
    {
        return TextInput::make('city')
            ->label(__('City'))
            ->required()
            ->maxLength(255);
    }

    public static function getStateFormField(): TextInput
    {
        return TextInput::make('state')
            ->label(__('State'))
            ->required()
            ->maxLength(255);
    }

    public static function getZipFormField(): TextInput
    {
        return TextInput::make('zip')
            ->label(__('Zip'))
            ->maxLength(255);
    }

    public static function getCountryFormField(): TextInput
    {
        return TextInput::make('country')
            ->label(__('Country'))
            ->required()
            ->maxLength(255);
    }

    public static function getPhoneFormField(): TextInput
    {
        return TextInput::make('phone')
            ->label(__('Phone'))
            ->required()
            ->maxLength(255);
    }

    public static function getEmailFormField(): TextInput
    {
        return TextInput::make('email')
            ->label(__('Email'))
            ->required()
            ->maxLength(255);
    }

    public static function getWebsiteFormField(): TextInput
    {
        return TextInput::make('website')
            ->label(__('Website'))
            ->maxLength(255);
    }

    public static function getDateFoundedFormField(): TextInput
    {
        return TextInput::make('date_founded')
            ->label(__('Date Founded'))
            ->maxLength(255);
    }

    public static function getMottoFormField(): TextInput
    {
        return TextInput::make('motto')
            ->label(__('Motto'))
            ->maxLength(255);
    }

    public static function getLogoPathFormField(): TextInput
    {
        return TextInput::make('logo_path')
            ->label(__('Logo Path'))
            ->maxLength(255);
    }

    public static function getCoverPathFormField(): TextInput
    {
        return TextInput::make('cover_path')
            ->label(__('Cover Path'))
            ->maxLength(255);
    }

    public static function getNumberOfStudentsFormField(): TextInput
    {
        return TextInput::make('number_of_students')
            ->label(__('Number of Students'))
            ->maxLength(255);
    }

    public static function getNumberOfTeachersFormField(): TextInput
    {
        return TextInput::make('number_of_teachers')
            ->label(__('Number of Teachers'))
            ->maxLength(255);
    }

    public static function getTypeFormField(): TextInput
    {
        return TextInput::make('type')
            ->label(__('Type'))
            ->maxLength(255);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getUserFormField(),
                $this->getNameFormField(),
                $this->getSlugFormField(),
                $this->getDescriptionFormField(),
                $this->getAddressFormField(),
                $this->getCityFormField(),
                $this->getStateFormField(),
                $this->getZipFormField(),
                $this->getCountryFormField(),
                $this->getPhoneFormField(),
                $this->getEmailFormField(),
                $this->getWebsiteFormField(),
                $this->getDateFoundedFormField(),
                $this->getMottoFormField(),
                $this->getLogoPathFormField(),
                $this->getCoverPathFormField(),
                $this->getNumberOfStudentsFormField(),
                $this->getNumberOfTeachersFormField(),
                $this->getTypeFormField(),
            ]);
    }
}
