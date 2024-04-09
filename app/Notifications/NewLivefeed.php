<?php

namespace App\Notifications;

use App\Models\Livefeed;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewLivefeed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Livefeed $livefeed)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject("New Chirp from {$this->livefeed->user->name}")
            ->greeting("New Chirp from {$this->livefeed->user->name}")
            ->line(Str::limit($this->livefeed->message, 50))
            ->action('Go to Livefeed', url('/livefeed'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
