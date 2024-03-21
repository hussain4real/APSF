<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Facades\Filament;
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
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use Livewire\Component;

class SubscriptionDetails extends MyProfileComponent implements HasForms, HasActions
{

    use InteractsWithForms, InteractsWithActions;
    public array $data;

    public Collection $transactions;
    // public $checkout;


    public function mount()
    {
        $user = auth()->user();
        $this->transactions = $user->transactions;
    }

    public function pauseSubscription()
    {
        $user = auth()->user();
        try {
            $user->subscription()->pause();
            Notification::make('subscription-paused')
                ->success()
                ->color('success')
                ->title('Subscription Paused')
                ->body('Your subscription has been paused. You will not be billed until you resume your subscription.')
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
        if (session()->has('success')) {
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
                    Action::make('mark as read')
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
