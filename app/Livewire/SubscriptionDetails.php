<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Actions\Action as ActionsAction;
use Filament\Notifications\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use Livewire\Attributes\On;

class SubscriptionDetails extends MyProfileComponent implements HasActions, HasForms
{
    use InteractsWithActions, InteractsWithForms;

    public array $data;

    public Collection $transactions;

    //    public $user;

    public Collection $subscriptions;

    public $subscribed;

    public string $subscriptionType;

    public function mount()
    {
        $user = auth()->user();
        $this->transactions = $user->transactions;
        $this->subscriptions = $user->subscriptions;
        $this->subscriptionType = $this->subscriptions->first()->type ?? '';
        $this->subscribed = $user->subscription();
    }

    public function pauseSubscription(): void
    {
        $user = User::where('id', auth()->id())->first();
        try {
            //            $user->subscription($this->subscriptionType)->pause();
            $user->subscription($this->subscriptionType)->pauseNow();
            Notification::make()
                ->success()
                ->color('success')
                ->title('Subscription Paused')
                ->body('Your subscription has been paused. You will not be billed until you resume your subscription.')
                ->sendToDatabase($user);
            Notification::make('subscription-paused')
                ->success()
                ->color('success')
                ->title('Subscription Paused')
                ->seconds(15)
                ->body('Your subscription has been paused. You will not be billed until you resume your subscription.')
                ->actions([
                    ActionsAction::make('resume')
                        ->button()
                        ->dispatch('resumeSubscription')
                        ->close(),

                ])
                ->send();

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Notification::make('subscription-paused')
                ->danger()
                ->color('danger')
                ->title('Subscription Not Paused')
                ->body('There was an error pausing your subscription. Please try again later.')
                ->send();
        }
    }

    #[On('resumeSubscription')] //
    public function resumeSubscription(): void
    {
        $user = User::where('id', auth()->id())->first();
        try {
            $user->subscription($this->subscriptionType)->resume();
            Notification::make('subscription-resumed')
                ->success()
                ->color('success')
                ->title('Subscription Resumed')
                ->body('Your subscription has been resumed. You will be billed on the next billing cycle.')
                ->sendToDatabase($user);
            Notification::make('subscription-resumed')
                ->success()
                ->color('success')
                ->title('Subscription Resumed')
                ->body('Your subscription has been resumed. You will be billed on the next billing cycle.')
                ->send();

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Notification::make('subscription-resumed')
                ->danger()
                ->color('danger')
                ->title('Subscription Not Resumed')
                ->body('There was an error resuming your subscription. Please try again later.')
                ->send();
        }
    }

    public function cancelSubscription(): void
    {
        $user = auth()->user();
        try {
            $user->subscription($this->subscriptionType)->cancel();
            Notification::make('subscription-canceled')
                ->success()
                ->color('success')
                ->title('Subscription Canceled')
                ->body('Your subscription has been canceled. You will not be billed again.')
                ->send();
            Notification::make('subscription-canceled')
                ->success()
                ->color('success')
                ->title('Subscription Canceled')
                ->body('Your subscription has been canceled. You will not be billed again.')
                ->sendToDatabase(auth()->user());
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Notification::make('subscription-canceled')
                ->danger()
                ->color('danger')
                ->title('Subscription Not Canceled')
                ->body('There was an error canceling your subscription. Please try again later.')
                ->send();
        }
    }

    public function subscribeAction(): Action
    {
        return Action::make('subscribe')
            ->url(route('subscribe'));
        // ->steps([
        //     Step::make('Plan')
        //     ->description('Choose a plan')
        //     ->schema([
        //     Select::make('plan')
        //         ->label('Plan')
        //         ->options([
        //             'pri_01hsb68jw5jmjbms2xbmr5ba9s' => 'Monthly',
        //             'pri_01hsb68jw5jmjbms2xbmr5ba9s' => 'Yearly',
        //         ])
        //         // ->afterStateUpdated(function (Request $request) {
        //         //     $checkout = $request->user()->subscribe(['pri_01hsb68jw5jmjbms2xbmr5ba9s'])
        //         //         ->returnTo(route('confirmation'));
        //         //     return $checkout;
        //         // }),
        //     ])
        //     ->getAction(),
        //     Step::make('action')
        //     ->description('subscribe to plan')
        //     ->schema([])
        // ])
        // ->action(function (Request $request) {

        //     $checkout = $request->user()->subscribe(['pri_01hsb68jw5jmjbms2xbmr5ba9s'])
        //         ->returnTo(route('confirmation'));

        //     session(['checkout' => $checkout]);
        //     // dd(session('checkout'));
        //     return view('subscribe', ['checkout' => $checkout]);

        // });
        // ->modalContent(function ():View {

        //     $checkout = session('checkout');
        //     // dd($checkout);
        //     return view('subscribe', ['checkout' => $checkout]);
        // });
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('first_name')
                ->label('First Name')
                ->placeholder('Enter your first name')
                ->required(),
        ])
            ->statePath('data');
    }

    // public function subscribe(Request $request)
    // {
    //     $checkout = $request->user()->checkout(['pri_01hsb68jw5jmjbms2xbmr5ba9s'])
    //         ->returnTo(route('welcome'));

    //     return view('subscribe', ['checkout' => $checkout]);
    // }

    public function subscribe()
    {
        redirect()->route('subscribe');
    }

    public function render()
    {
        if (session()->has('subscribed')) {
            Notification::make('subscribed')
                ->success()
                ->title('You are now subscribed!')
                ->body('You are now subscribed to our service. Thank you for your support!')
                ->send();

            Notification::make('subscribed')
                ->success()
                ->title('You are now subscribed!')
                ->body('You are now subscribed to our service. Thank you for your support!')
                ->actions([
                    ActionsAction::make('view')
                        ->button()
                        ->url(MyProfilePage::getUrl())
                        ->markAsRead(),
                    ActionsAction::make('mark as read')
                        ->markAsUnread(),
                ])
                ->sendToDatabase(auth()->user());
        }

        return view('livewire.subscription-details-component', [
            'transactions' => $this->transactions,
            // 'checkout' => $this->checkout,

        ]);
    }
}
