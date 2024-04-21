<?php

namespace App\Providers;

use App\Models\User;
use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Filament\Support\Assets\Js;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentColor;
use Illuminate\Auth\Access\Gate;
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

        \Illuminate\Support\Facades\Gate::define('use-translation-manager', function (?User $user) {
            // Your authorization logic
            return $user !== null ;
        });
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch){
            $switch
                ->locales(['ar','en'])
            ->visible(outsidePanels: true)
//            ->outsidePanelRoutes([
//                'welcome',
//                'about'
//            ])
            ->outsidePanelPlacement(Placement::BottomCenter);
        });
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
