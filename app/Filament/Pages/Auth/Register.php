<?php

namespace App\Filament\Pages\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard\Step;
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
            ->options([
                'school' => 'School',
                'teacher' => 'Teacher',
                'student' => 'Student',
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
            Step::make('Authentication credentials')
                ->icon('heroicon-o-key')
                ->description(__('Please provide your authentication credentials'))
                ->schema([
                    $this->getFirstNameFormComponent(),
                    $this->getLastNameFormComponent(),
                    $this->getEmailFormComponent(),
                    $this->getPasswordFormComponent(),
                    $this->getPasswordConfirmationFormComponent(),
                    $this->getEntityFormField(),
                ]),
            Step::make('S'),
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

            return $this->getUserModel()::create($data);
        });

        event(new \Illuminate\Auth\Events\Registered($user));

        $this->sendEmailVerificationNotification($user);

        Filament::auth()->login($user);

        session()->regenerate();

        return app(RegistrationResponse::class);
    }
}
