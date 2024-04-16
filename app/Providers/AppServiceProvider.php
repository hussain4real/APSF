<?php

namespace App\Providers;

use Filament\Notifications\Livewire\DatabaseNotifications;
use Filament\Support\Assets\Js;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        DatabaseNotifications::trigger('filament.notifications.database-notifications-trigger');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // FilamentAsset::register([
        //     Js::make('app', __DIR__ . '/../../resources/js/app.js'),
        // ]);

        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Teal,
            'secondary' => Color::Amber,
            'success' => Color::Green,
            'warning' => Color::Yellow,
        ]);
    }
}
