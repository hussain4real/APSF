<?php

namespace App\Listeners;

use App\Models\User;
use App\Notifications\MemberWelcome;
use App\Notifications\SubscriptionStarted;
use Filament\Notifications\Actions\Action;
use Filament\Notifications\Notification;
use Illuminate\Auth\Events\Verified;

class SendWelcomeEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Verified $event): void
    {
        $event->user->notify(new MemberWelcome());
        $users = User::role(['super_admin', 'admin'])->get();

        //check if user is student,teacher or member sen subscription email
        if ($event->user->student || $event->user->teacher || $event->user->member) {
            $event->user->notify(new SubscriptionStarted($event->user->subscription));
            Notification::make()
                ->title('Subscription Started')
                ->body('Subscription email sent to ' . $event->user->email)
                ->success()
                ->actions([
                    Action::make('mark-as-read')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-check-circle')
                        ->markAsRead()
                        ->button(),
                        Action::make('mark-as-unread')
                        ->label('Mark as Unread')
                        ->icon('heroicon-o-arrow-uturn-up')
                        ->markAsUnread()
                        
                ])
                ->sendToDatabase($users);
        }

        Notification::make()
            ->title('Welcome Email Sent')
            ->body('Welcome email sent to ' . $event->user->email)
            ->success()
            ->actions([
                Action::make('mark-as-read')
                    ->label('Mark as Read')
                    ->icon('heroicon-o-check-circle')
                    ->markAsRead()
                    ->button(),
                    Action::make('mark-as-unread')
                    ->label('Mark as Unread')
                    ->icon('heroicon-o-arrow-uturn-up')
                    ->markAsUnread()
                    
            ])
            ->sendToDatabase($users);
    }
}
