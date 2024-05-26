<?php

namespace App\Filament\Pages\Auth;

use App\Filament\Clusters\Contractors\Resources\ContractorResource\Pages\CreateContractor;
use App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource\Pages\CreateEducationalConsultant;
use App\Filament\Clusters\Founders\Resources\FounderResource\Pages\CreateFounder;
use App\Filament\Clusters\Members\Resources\MemberResource\Pages\CreateMember;
use App\Filament\Clusters\Schools\Resources\SchoolResource\Pages\CreateSchool;
use App\Filament\Clusters\Students\Resources\StudentResource\Pages\CreateStudent;
use App\Filament\Clusters\Teachers\Resources\TeacherResource\Pages\CreateTeacher;
use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource\Pages\CreateTrainingProvider;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Actions\Action;
use Filament\Events\Auth\Registered;
use Filament\Facades\Filament;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Get;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Register extends BaseRegister
{
    use \Filament\Resources\Pages\CreateRecord\Concerns\HasWizard;

    public function getMaxWidth(): MaxWidth|string|null
    {
        return MaxWidth::ThreeExtraLarge;
    }

    public function getFirstNameFormComponent(): TextInput
    {
        return TextInput::make('first_name')
            ->label(__('First Name'))
            ->placeholder(__('Hauwa'))
            ->minLength(2)
            ->maxLength(155)
            ->required();
    }

    public function getLastNameFormComponent(): TextInput
    {
        return TextInput::make('last_name')
            ->label(__('Last Name'))
            ->placeholder(__('Adam'))
            ->minLength(2)
            ->maxLength(155)
            ->required();
    }

    public function getPhoneNumberFormComponent(): TextInput
    {
        return TextInput::make('phone')
            ->label(__('Phone Number'))
            ->placeholder('+123-4566-7890')
            ->tel()
            ->prefixIcon('heroicon-o-phone')
            ->prefixIconColor('primary')
            ->required();

    }

    public function getAddressFormComponent(): TextInput
    {
        return TextInput::make('address')
            ->label(__('Address'))
            ->placeholder(__('123 Main St'))
            ->prefixIcon('heroicon-o-map-pin')
            ->prefixIconColor('primary')
            ->maxLength(255);
    }

    public function getCityFormComponent(): TextInput
    {
        return TextInput::make('city')
            ->label(__('City'))
            ->placeholder(__('Lagos'))
            ->maxLength(155);
    }

    public function getStateFormComponent(): TextInput
    {
        return TextInput::make('state')
            ->label(__('State'))
            ->placeholder(__('Lagos'))
            ->maxLength(155);
    }

    public function getCountryFormComponent(): TextInput
    {
        return TextInput::make('country')
            ->label(__('Country'))
            ->placeholder(__('Nigeria'))
            ->maxLength(155);
    }

    public function getDateOfBirthFormComponent(): DatePicker
    {
        return DatePicker::make('date_of_birth')
            ->label(__('Date of Birth'))
            ->placeholder(__('YYYY-MM-DD'))
            ->native(false)
            ->required();
    }

    public static function getEntityFormField(): Select
    {
        return Select::make('entity')
            ->label(__('Profiles'))
            ->options([
                //                'founder' => __('founder'),
                'school' => __('school'),
                'teacher' => __('teacher'),
                'student' => __('student'),
                'service provider' => __('Service Provider'),
                'member' => __('Others'),
            ])
            ->prefixIcon('heroicon-o-user');
        //        return ToggleButtons::make('entity')
        //            ->label(__('profiles'))
        //            ->options([
        //                //                'founder' => __('founder'),
        //                'school' => __('school'),
        //                'teacher' => __('teacher'),
        //                'student' => __('student'),
        //                'member' => __('member'),
        //                'contractor' => __('contractor'),
        //                'training_provider' => __('training provider'),
        //                'educational_consultant' => __('educational consultant'),
        //            ])
        //            ->inline();
    }

    public static function getServiceProviderFormField(): Select
    {
        return Select::make('service_provider')
            ->label(__('Service Provider'))
            ->options([
                'contractor' => __('contractor'),
                'training_provider' => __('training provider'),
                'educational_consultant' => __('educational consultant'),
            ]);
    }

    public function getCancelFormAction(): Action
    {
        return Action::make('cancel')
            ->label(__('Cancel'));
    }

    //school form start here
    public function getSteps(): array
    {
        return [
            Step::make('Entity')
                ->translateLabel()
                ->icon('heroicon-o-clipboard')
                ->description(__('Please select your profile'))
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->schema([
                    $this->getEntityFormField()
                        ->live(onBlur: false)
                        ->default('member'),
                    $this->getServiceProviderFormField()
                        ->live(onBlur: false)
                        ->visible(function (Get $get) {
                            return $get('entity') === 'service provider';
                        }),
                ]),
            //            Step::make('Service Provider Selection')
            //                ->translateLabel()
            //                ->description(__('Please select the type of service you provide'))
            //                ->schema([
            //                    $this->getServiceProviderFormField()
            //                        ->live(onBlur: false)
            //                        ->default('contractor'),
            //                ])
            //                ->visible(function (Get $get) {
            //                    return $get('entity') === 'service provider';
            //                }),
            Step::make('School Profile')
                ->translateLabel()
                ->icon('heroicon-o-building-library')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->visible(function (Get $get) {
                    return $get('entity') === 'school';
                })
            //                ->hidden(function (Get $get) {
            //                    return $get('entity') !== 'school';
            //                })
                ->description(__('Please provide your school details'))
                ->schema([
                    CreateSchool::getNameFormField(),
                    CreateSchool::getDescriptionFormField(),
                    CreateSchool::getAddressFormField(),
                    CreateSchool::getCityFormField(),
                    CreateSchool::getStateFormField(),
                ]),
            Step::make('Teacher Profile')
                ->translateLabel()
                ->icon('heroicon-o-user-plus')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->visible(function (Get $get) {
                    return $get('entity') === 'teacher';
                })
                ->description(__('Please provide more details to complete your profile as a teacher'))
                ->schema([
                    CreateTeacher::getAddressFormField(),
                    CreateTeacher::getSubjectTaughtFormField(),
                    CreateTeacher::getQualificationFormField(),
                    CreateTeacher::getDateOfBirthFormField(),
                    CreateTeacher::getPreviousExperienceFormField(),
                    CreateTeacher::getCountryFormField(),
                    CreateTeacher::getPhoneFormField(),
                ]),
            Step::make('Student Profile')
                ->translateLabel()
                ->icon('heroicon-o-academic-cap')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->visible(function (Get $get) {
                    return $get('entity') === 'student';
                })
                ->description(__('Please provide more details to complete your profile as a student'))
                ->schema([
                    CreateStudent::getSchoolNameFormField(),
                    CreateStudent::getCurrentGradeFormField(),
                    CreateStudent::getAddressFormField(),
                    CreateStudent::getDateOfBirthFormField(),
                    CreateStudent::getCountryFormField(),
                    CreateStudent::getPhoneFormField(),
                ]),
            Step::make('Contractor Profile')
                ->translateLabel()
                ->icon('heroicon-o-clipboard-document')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->visible(function (Get $get) {
                    return $get('service_provider') === 'contractor';
                })
                ->description(__('Please provide more details to complete your profile as a contractor'))
                ->schema([
                    CreateContractor::getBusinessNameFormField(),
                    CreateContractor::getBusinessTypeFormField(),
                    CreateContractor::getBusinessAddressFormField(),
                    CreateContractor::getBusinessPhoneFormField(),
                    CreateContractor::getBusinessEmailFormField(),
                    CreateContractor::getBusinessWebsiteFormField(),
                    CreateContractor::getBusinessDescriptionFormField(),
                ]),
            //            Step::make('Founder Profile')
            //                ->icon('heroicon-o-check-badge')
            //                ->completedIcon('heroicon-m-hand-thumb-up')
            //                ->visible(function (Get $get) {
            //                    return $get('entity') === 'founder';
            //                })
            //                ->description(__('Please provide more details to complete your profile as a founder'))
            //                ->schema([
            //                    CreateFounder::getCompanyNameFormField(),
            //                    CreateFounder::getCompanyPhoneFormField(),
            //                    CreateFounder::getCompanyAddressFormField(),
            //                    CreateFounder::getCompanyCityFormField(),
            //                    CreateFounder::getCompanyStateFormField(),
            //                    CreateFounder::getCompanyCountryFormField(),
            //                    CreateFounder::getCompanyWebsiteFormField(),
            //                ]),
            Step::make('Training Provider Profile')
                ->translateLabel()
                ->icon('heroicon-o-clipboard-document-check')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->visible(function (Get $get) {
                    return $get('service_provider') === 'training_provider';
                })
                ->description(__('Please provide more details to complete your profile as a training provider'))
                ->schema([
                    CreateTrainingProvider::getInstitutionNameFormField(),
                    CreateTrainingProvider::getInstitutionTypeFormField(),
                    CreateTrainingProvider::getInstitutionAddressFormField(),
                    CreateTrainingProvider::getInstitutionPhoneFormField(),
                    CreateTrainingProvider::getInstitutionEmailFormField(),
                    CreateTrainingProvider::getInstitutionWebsiteFormField(),
                    CreateTrainingProvider::getInstitutionDescriptionFormField(),
                ]),
            Step::make('Educational Consultant Profile')
                ->translateLabel()
                ->icon('heroicon-o-chart-pie')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->visible(function (Get $get) {
                    return $get('service_provider') === 'educational_consultant';
                })
                ->description(__('Please provide more details to complete your profile as an educational consultant'))
                ->schema([
                    CreateEducationalConsultant::getQualificationFormField(),
                    CreateEducationalConsultant::getYearsOfExperienceFormField(),
                    CreateEducationalConsultant::getSpecializationFormField(),
                    CreateEducationalConsultant::getPhoneNumberFormField(),
                    CreateEducationalConsultant::getAddressFormField(),
                    CreateEducationalConsultant::getCityFormField(),
                    CreateEducationalConsultant::getStateFormField(),
                    CreateEducationalConsultant::getCountryFormField(),
                ]),
            Step::make('Member Profile')
                ->translateLabel()
                ->icon('heroicon-o-identification')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->visible(function (Get $get) {
                    return $get('entity') === 'member';
                })
                ->description(__('Please provide more details to complete your profile as a member'))
                ->schema([
                    CreateMember::getPhoneNumberFormField(),
                    CreateMember::getAddressFormField(),
                    CreateMember::getCountryFormField(),
                    CreateMember::getDateOfBirthFormField(),
                ]),
            Step::make('Authentication credentials')
                ->translateLabel()
                ->icon('heroicon-o-key')
                ->completedIcon('heroicon-m-hand-thumb-up')
                ->description(__('Please provide your authentication credentials'))
                ->schema([
                    $this->getFirstNameFormComponent(),
                    $this->getLastNameFormComponent(),
                    $this->getEmailFormComponent(),
                    $this->getPasswordFormComponent(),
                    $this->getPasswordConfirmationFormComponent(),

                ]),

        ];
    }

    public function getSubmitFormAction(): Action
    {
        return Action::make('register')
            ->label(__('filament-panels::pages/auth/register.form.actions.register.label'))
            ->submit('register');
    }

    /**
     * @throws \Exception
     */
    public function register(): ?RegistrationResponse
    {
        try {
            $this->rateLimit(3);
        } catch (TooManyRequestsException $exception) {
            Notification::make()
                ->title(__('filament-panels::pages/auth/register.notifications.throttled.title', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]))
                ->body(array_key_exists('body', __('filament-panels::pages/auth/register.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/register.notifications.throttled.body', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]) : null)
                ->danger()
                ->send();

            return null;
        }

        $user = DB::transaction(function () {
            $data = $this->form->getState();

            $user = $this->getUserModel()::create($data);

            //            dd($user);
            match ($data['entity'] || $data['service_provider'] ?? null) {
                //                'school' => $this->getSchoolModel()::create(array_merge($data, ['user_id' => $user->id])),
                //user hasMany schools and school belongsTo user
                'school' => $user->schools()->create([
                    'school_name' => $data['school_name'],
                    'slug' => Str::slug($data['school_name']),
                    'description' => $data['description'],
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                ]),
                'teacher' => $this->getTeacherModel()::create(array_merge($data, ['user_id' => $user->id])),
                'student' => $this->getStudentModel()::create(array_merge($data, ['user_id' => $user->id])),
                'contractor' => $this->getContractorModel()::create(array_merge($data, ['user_id' => $user->id])),
                //                'founder' => $this->getFounderModel()::create(array_merge($data, ['user_id' => $user->id])),
                'training_provider' => $this->getTrainingProviderModel()::create(array_merge($data, ['user_id' => $user->id])),
                'educational_consultant' => $this->getEducationalConsultantModel()::create(array_merge($data, ['user_id' => $user->id])),
                'member' => $this->getMemberModel()::create(array_merge($data, ['user_id' => $user->id])),
                default => null,
            };

            return $user;
        });

        //        events(new Registered($user));
        //
        //        $this->sendEmailVerificationNotification($user);

        //        $user->createAsCustomer([
        //            'name' => $user->first_name.' '.$user->last_name,
        //            'trial_ends_at' => now()->addDays(7)->format('Y-m-d H:i:s'),
        //        ]);
        Filament::auth()->login($user);

        session()->regenerate();

        return app(RegistrationResponse::class);
    }

    //    protected function mutateFormDataBeforeRegister(array $data): array
    //    {
    //
    //    }

    protected function getSchoolModel(): string
    {
        return \App\Models\School::class;
    }

    protected function getStudentModel(): string
    {
        return \App\Models\Student::class;
    }

    protected function getTeacherModel(): string
    {
        return \App\Models\Teacher::class;
    }

    protected function getContractorModel(): string
    {
        return \App\Models\Contractor::class;
    }

    protected function getFounderModel(): string
    {
        return \App\Models\Founder::class;
    }

    protected function getTrainingProviderModel(): string
    {
        return \App\Models\TrainingProvider::class;
    }

    protected function getEducationalConsultantModel(): string
    {
        return \App\Models\EducationalConsultant::class;
    }

    protected function getMemberModel(): string
    {
        return \App\Models\Member::class;
    }
}
