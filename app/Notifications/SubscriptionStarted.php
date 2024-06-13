<?php

namespace App\Notifications;

use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Spatie\Browsershot\Browsershot;



class SubscriptionStarted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Subscription $subscription)
    {
        $this->afterCommit();
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
        $subscription = $this->subscription;

        $expiryDate = Carbon::parse($subscription->ends_at)->format('m/y');
        $url = route('filament.admin.auth.profile');
        $user = $subscription->user;


        $imagePath = 'card.png';
        Browsershot::html(View::make('usercard', [
            'user' => $user,
            'expiryDate' => $expiryDate,
        ])->render())
            ->select('div')
            ->hideBackground()
            ->deviceScaleFactor(2)
            ->windowSize(600, 260)
            ->userAgent('My Mobile Browser 1.0')
            ->mobile()
            ->touch()
            ->save($imagePath);

        // Save the screenshot to Laravel's storage
        Storage::put('public/usercard/' . $user->id . '_card.png', file_get_contents($imagePath));

        // Get the URL of the saved image
        $imageUrl = Storage::url('public/usercard/' . $user->id . '_card.png');
        // $downloadurl = Storage::download($imageUrl);



        return (new MailMessage)
            ->subject('Subscription Confirmation - Arab Private Schools Federation')
            ->attach($imageUrl, [
                'as' => 'usercard.png',
                'mime' => 'image/png',
            ])
            ->markdown('mail.subscription.started', [
                'subscription' => $subscription,
                'url' => $url,
                'imageUrl' => $imageUrl,
                // 'downloadurl' => $downloadurl,
            ]);
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
