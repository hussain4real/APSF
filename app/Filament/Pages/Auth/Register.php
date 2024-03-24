<?php

namespace App\Filament\Pages\Auth;

use App\Filament\Clusters\Contractors\Resources\ContractorResource\Pages\CreateContractor;
use App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource\Pages\CreateEducationalConsultant;
use App\Filament\Clusters\Founders\Resources\FounderResource\Pages\CreateFounder;
use App\Filament\Clusters\Schools\Resources\SchoolResource\Pages\CreateSchool;
use App\Filament\Clusters\Students\Resources\StudentResource\Pages\CreateStudent;
use App\Filament\Clusters\Teachers\Resources\TeacherResource\Pages\CreateTeacher;
use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource\Pages\CreateTrainingProvider;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Get;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register as BaseRegister;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\DB;

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

    public static function getEntityFormField(): ToggleButtons
    {
        return ToggleButtons::make('entity')
            ->label(__('Profiles'))
            ->options([
                'school' => 'School',
                'teacher' => 'Teacher',
                'student' => 'Student',
                'contractor' => 'Contractor',
                'founder' => 'Founder',
                'training_provider' => 'Training Provider',
                'educational_consultant' => 'Educational Consultant',
            ])
            ->inline();
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
                ->icon('heroicon-o-clipboard')
                ->description(__('Please select your profile'))
                ->schema([
                    $this->getEntityFormField()
                        ->live(onBlur: false),
                ]),
            Step::make('School Profile')
                ->icon('heroicon-o-building-library')
                ->visible(function (Get $get) {
                    return $get('entity') === 'school';
                })
                //                ->hidden(function (Get $get) {
                //                    return $get('entity') !== 'school';
                //                })
                ->description(__('Please provide your school details'))
                ->schema([
                    CreateSchool::getNameFormField(),
                    CreateSchool::getSlugFormField(),
                    CreateSchool::getDescriptionFormField(),
                    CreateSchool::getAddressFormField(),
                    CreateSchool::getCityFormField(),
                    CreateSchool::getStateFormField(),
                ]),
            Step::make('Teacher Profile')
                ->icon('heroicon-o-user-plus')
                ->visible(function (Get $get) {
                    return $get('entity') === 'teacher';
                })
                ->description(__('Please provide more details to complete your profile as teacher'))
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
                ->icon('heroicon-o-academic-cap')
                ->visible(function (Get $get) {
                    return $get('entity') === 'student';
                })
                ->description(__('Please provide more details to complete your profile as student'))
                ->schema([
                    CreateStudent::getSchoolNameFormField(),
                    CreateStudent::getCurrentGradeFormField(),
                    CreateStudent::getAddressFormField(),
                    CreateStudent::getDateOfBirthFormField(),
                    CreateStudent::getCountryFormField(),
                    CreateStudent::getPhoneFormField(),
                ]),
            Step::make('Contractor Profile')
                ->icon('heroicon-o-clipboard-document')
                ->visible(function (Get $get) {
                    return $get('entity') === 'contractor';
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
                    CreateContractor::getBusinessLicenseFormField(),
                    CreateContractor::getBusinessLicenseExpFormField(),
                ]),
            Step::make('Founder Profile')
                ->icon('heroicon-o-check-badge')
                ->visible(function (Get $get) {
                    return $get('entity') === 'founder';
                })
                ->description(__('Please provide more details to complete your profile as a founder'))
                ->schema([
                    CreateFounder::getCompanyNameFormField(),
                    CreateFounder::getCompanyPhoneFormField(),
                    CreateFounder::getCompanyAddressFormField(),
                    CreateFounder::getCompanyCityFormField(),
                    CreateFounder::getCompanyStateFormField(),
                    CreateFounder::getCompanyCountryFormField(),
                    CreateFounder::getCompanyWebsiteFormField(),
                ]),
            Step::make('Training Provider Profile')
                ->icon('heroicon-o-clipboard-document-check')
                ->visible(function (Get $get) {
                    return $get('entity') === 'training_provider';
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
                    CreateTrainingProvider::getInstitutionLicenseFormField(),
                    CreateTrainingProvider::getInstitutionLicenseExpFormField(),
                ]),
            Step::make('Educational Consultant Profile')
                ->icon('heroicon-o-chart-pie')
                ->visible(function (Get $get) {
                    return $get('entity') === 'educational_consultant';
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
            Step::make('Authentication credentials')
                ->icon('heroicon-o-key')
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

            match ($data['entity']) {
                'school' => $this->getSchoolModel()::create(array_merge($data, ['user_id' => $user->id])),
                'teacher' => $this->getTeacherModel()::create(array_merge($data, ['user_id' => $user->id])),
                'student' => $this->getStudentModel()::create(array_merge($data, ['user_id' => $user->id])),
                'contractor' => $this->getContractorModel()::create(array_merge($data, ['user_id' => $user->id])),
                'founder' => $this->getFounderModel()::create(array_merge($data, ['user_id' => $user->id])),
                'training_provider' => $this->getTrainingProviderModel()::create(array_merge($data, ['user_id' => $user->id])),
                'educational_consultant' => $this->getEducationalConsultantModel()::create(array_merge($data, ['user_id' => $user->id])),
                default => null,
            };

            return $user;
        });

        $user->createAsCustomer([
            'name' => $user->first_name.' '.$user->last_name,
            'trial_ends_at' => now()->addDays(7)->format('Y-m-d H:i:s'),
        ]);

        event(new \Illuminate\Auth\Events\Registered($user));

        $this->sendEmailVerificationNotification($user);

        Filament::auth()->login($user);

        session()->regenerate();

        return app(RegistrationResponse::class);
    }

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
}
