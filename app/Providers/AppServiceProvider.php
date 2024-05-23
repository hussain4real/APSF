<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
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
            'primary' => Color::Teal,
            //            'primary' => '#033731',
            'secondary' => '#E4622C',
            'success' => Color::Green,
            'warning' => Color::Yellow,
        ]);
    }
}
