<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Filament\Support\Assets\Js;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;
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
        Model::unguard();
        // Event::listen('*', function ($event, array $data) {
        //     // Log the event class
        //     error_log($event);
        //     // Log the event data delegated to listener parameters
        //     error_log(json_encode($data, JSON_PRETTY_PRINT));
        // });

        view()->composer('partials.language_switcher', function ($view) {
            $view->with('current_locale', app()->getLocale());
            $view->with('available_locales', config('app.available_locales'));
        });

        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar', 'en'])
                ->visible(outsidePanels: true)
                //             ->outsidePanelRoutes([
                //                 'welcome',
                //                 'about'
                //             ])
                ->outsidePanelPlacement(Placement::TopLeft);
        });
        // FilamentAsset::register([
        //     Js::make('app', __DIR__ . '/../../resources/js/app.js'),
        // ]);

        FilamentColor::register([
            'danger' => Color::Red,
            'gray' => Color::Zinc,
            'info' => Color::Blue,
            'primary' => Color::Orange,
            //            'primary' => '#033731',
            'secondary' => Color::Teal,
            'success' => Color::Green,
            'warning' => Color::Yellow,
        ]);
    }
}
