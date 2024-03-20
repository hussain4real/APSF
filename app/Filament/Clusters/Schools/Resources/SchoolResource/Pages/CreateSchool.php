<?php

namespace App\Filament\Clusters\Schools\Resources\SchoolResource\Pages;

use App\Filament\Clusters\Schools\Resources\SchoolResource;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateSchool extends CreateRecord
{
    protected static string $resource = SchoolResource::class;

    public static function getUserFormField():Select
    {
        return Select::make('user_id')
            ->relationship('user', 'id')
            ->required();
    }

    public static function getNameFormField():TextInput
    {
        return TextInput::make('name')
            ->required()
            ->maxLength(255);
    }

    public static function getSlugFormField():TextInput
    {
        return TextInput::make('slug')
            ->required()
            ->maxLength(255);
    }

    public static function getDescriptionFormField():TextInput
    {
        return TextInput::make('description')
            ->required()
            ->maxLength(255);
    }

    public static function getAddressFormField():TextInput
    {
        return TextInput::make('address')
            ->required()
            ->maxLength(255);
    }

    public static function getCityFormField():TextInput
    {
        return TextInput::make('city')
            ->required()
            ->maxLength(255);
    }

    public static function getStateFormField():TextInput
    {
        return TextInput::make('state')
            ->required()
            ->maxLength(255);
    }

    public static function getZipFormField():TextInput
    {
        return TextInput::make('zip')
            ->required()
            ->maxLength(255);
    }

    public static function getCountryFormField():TextInput
    {
        return TextInput::make('country')
            ->required()
            ->maxLength(255);
    }

    public static function getPhoneFormField():TextInput
    {
        return TextInput::make('phone')
            ->required()
            ->maxLength(255);
    }

    public static function getEmailFormField():TextInput
    {
        return TextInput::make('email')
            ->required()
            ->maxLength(255);
    }

    public static function getWebsiteFormField():TextInput
    {
        return TextInput::make('website')
            ->required()
            ->maxLength(255);
    }

    public static function getDateFoundedFormField():TextInput
    {
        return TextInput::make('date_founded')
            ->required()
            ->maxLength(255);
    }

    public static function getMottoFormField():TextInput
    {
        return TextInput::make('motto')
            ->required()
            ->maxLength(255);
    }

    public static function getLogoPathFormField():TextInput
    {
        return TextInput::make('logo_path')
            ->required()
            ->maxLength(255);
    }

    public static function getCoverPathFormField():TextInput
    {
        return TextInput::make('cover_path')
            ->required()
            ->maxLength(255);
    }

    public static function getNumberOfStudentsFormField():TextInput
    {
        return TextInput::make('number_of_students')
            ->required()
            ->maxLength(255);
    }

    public static function getNumberOfTeachersFormField():TextInput
    {
        return TextInput::make('number_of_teachers')
            ->required()
            ->maxLength(255);
    }

    public static function getTypeFormField():TextInput
    {
        return TextInput::make('type')
            ->required()
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
