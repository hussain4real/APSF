<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Subscription;
use App\Models\Transaction;
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
use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Concerns\InteractsWithInfolists;
use Filament\Infolists\Contracts\HasInfolists;
use Filament\Infolists\Infolist;
use Filament\Notifications\Actions\Action as ActionsAction;
use Filament\Notifications\Notification;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Jeffgreco13\FilamentBreezy\Livewire\MyProfileComponent;
use Jeffgreco13\FilamentBreezy\Pages\MyProfilePage;
use Livewire\Attributes\On;

class SubscriptionDetails extends MyProfileComponent implements HasActions, HasForms, HasInfolists, HasTable
{
    use InteractsWithActions, InteractsWithForms, InteractsWithInfolists, InteractsWithTable;

    public array $data;

    public Collection $transactions;

    //    public $user;

    public Collection $subscriptions;

    public $subscribed;

    public string $subscriptionType;

    public $user;

    public function mount()
    {
        $this->user = auth()->user();
        $this->transactions = $this->user->transactions ?? new Collection();
        $this->subscriptions = $this->user->subscription()->get() ?? new Collection();
        $this->subscriptionType = $this->subscriptions->first()->type ?? '';
        $this->subscribed = $this->user->subscribed();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Transaction::query()->where('user_id', auth()->id()))
            ->columns([
                TextColumn::make('order_date')
                    ->label(__('Transaction Date'))
                    ->date()
                    ->color('info')
                    ->badge(),
                TextColumn::make('amount')
                    ->money('USD'),
                TextColumn::make('status')
                    ->badge(),

            ])
            ->filters([])
            ->actions([
                \Filament\Tables\Actions\Action::make('view')
                    ->label('View Transaction')
                    ->icon('heroicon-o-eye')
                    ->modalContent(function (Transaction $transaction): View {
                        return view('invoices.view', ['transaction' => $transaction]);
                    })
                    ->modalSubmitAction(false)
                    ->modalCancelAction(false),
                // ->url(fn (Transaction $order) => $order->receipt_url)
                // ->openUrlInNewTab(),
            ])
            ->bulkActions([])
            ->emptyStateHeading(__('No Transaction yet'))
            ->emptyStateDescription(__('Once you purchase a subscription, your transactions will appear here'))
            ->emptyStateIcon('heroicon-o-credit-card')
            ->emptyStateActions([
                \Filament\Tables\Actions\Action::make('subscribe')
                    ->label(__('Subscribe'))
                    ->url(route('subscribe'))
                    ->icon('heroicon-o-plus')
                    ->button(),
            ]);
    }

    public function subscriptionInfolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->record($this->user?->subscription ?? new Subscription())
            ->schema([
                TextEntry::make('name')
                    ->label('Plan')
                    ->state(function (User $user) {
                        $user = auth()->user();

                        //                        dd($user);
                        return "{$user->profile_type} Subscription";
                    })
                    ->size(size: TextEntry\TextEntrySize::Medium)
                    ->weight(weight: FontWeight::SemiBold)
                    ->color('info')
                    ->icon('heroicon-o-ticket')
                    ->badge()
                    ->placeholder('No subscription found'),
                TextEntry::make('status')
                    ->badge()
                    ->placeholder('No subscription found'),
                TextEntry::make('ends_at')
                    ->date()
                    ->since()
                    ->badge()
                    ->color('info')
                    ->placeholder('No subscription found'),

                Actions::make([
                    \Filament\Infolists\Components\Actions\Action::make('manage')
                        ->icon('heroicon-o-cog')
                        ->button()
                        ->disabled(fn () => !auth()->user()->subscribed())
                        ->tooltip('Manage your payment details Subscription'),
                    //                        ->url(function () {
                    //
                    //                            $user = auth()->user();
                    //
                    //                            if (! $user->subscribed()) {
                    //
                    //                                return null;
                    //                            }
                    //
                    //                            return $user?->customerPortalUrl();
                    //                        })
                    //                        ->openUrlInNewTab(),
                ]),
            ])
            ->columns([
                'lg' => 2,
            ]);
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
        //            ->action(function (Request $request) {
        //
        //                $checkout = $request->user()->subscribe('342344')
        //                    ->redirectTo(route('confirmation'));
        //
        //                session(['checkout' => $checkout]);
        //
        //                // dd(session('checkout'));
        //                return view('subscribe', ['checkout' => $checkout]);
        //
        //            });
        //            ->modalContent(function (Request $request): View {
        //
        //                $studentsSubscriptionVariantID = '342344';
        //                $schoolsSubscriptionVariantID = '342334';
        //                $membersSubscriptionVariantID = '342342';
        //
        //                $subscriptionVariantID = match (true) {
        //                    $request->user()->student !== null => $studentsSubscriptionVariantID,
        //                    $request->user()->schools !== null => $schoolsSubscriptionVariantID,
        //                    default => $membersSubscriptionVariantID,
        //                };
        //                $subscriptionName = match (true) {
        //                    $request->user()->student !== null => 'Student Annual Subscription Fee',
        //                    $request->user()->schools !== null => 'School Annual Subscription Fee',
        //                    default => 'Member Annual Subscription Fee',
        //                };
        //
        //                $suscriptionPrice = match (true) {
        //                    $request->user()->student !== null => 50,
        //                    $request->user()->schools !== null => 500,
        //                    default => 100,
        //                };
        //                $checkout = $request->user()->subscribe($subscriptionVariantID)
        //                    ->redirectTo(route('filament.admin.pages.my-profile'));
        //                //                $checkout = session('checkout');
        //
        //                //                dd($checkout);
        //
        //                return view('filament.pages.lemon-subscription', [
        //                    'checkout' => $checkout,
        //                    'subscriptionPrice' => $suscriptionPrice,
        //                    'subscriptionName' => $subscriptionName,
        //                ]);
        //            });
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
