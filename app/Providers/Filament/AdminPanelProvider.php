<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Login;
use App\Filament\Pages\Auth\Register;
use App\Filament\Resources\AnnouncementResource;
use App\Http\Middleware\EnsureUserIsSubscribed;
use App\Models\ChMessage;
use DutchCodingCompany\FilamentDeveloperLogins\FilamentDeveloperLoginsPlugin;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Auth\EditProfile;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Platform;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Rupadana\FilamentAnnounce\FilamentAnnouncePlugin;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->registration(Register::class)
            ->profile(EditProfile::class)
            ->emailVerification()
            ->passwordReset()
            ->colors([
                'primary' => Color::Orange,
            ])
            ->databaseTransactions(true)
            ->brandLogo(asset('assets/imgs/apsf/logo/apsflogo_271x69.webp'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('assets/imgs/apsf/logo/apsf_favicon.png'))
            ->darkModeBrandLogo(asset('assets/imgs/apsf/logo/apsflogo_271x69_white.webp'))
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverClusters(in: app_path('Filament/Clusters'), for: 'App\\Filament\\Clusters')
            ->pages([
                //                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                //                Widgets\AccountWidget::class,
                //                Widgets\FilamentInfoWidget::class,
            ])
            ->plugins([
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['en', 'ar']),
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        shouldRegisterNavigation: true,
                        hasAvatars: true,
                        slug: 'my-profile',
                        navigationGroup: 'Settings',

                    )

                    ->myProfileComponents([
                        'subscription' => \App\Livewire\SubscriptionDetails::class,
                    ]),
                FilamentAnnouncePlugin::make()
                    ->defaultColor('info')
                    ->usingResource(AnnouncementResource::class),
                FilamentDeveloperLoginsPlugin::make()
                    ->enabled(app()->environment('local'))
                    ->users([
                        'Admin' => 'Admin',
                        'User' => 'Robert',
                    ])
                    ->column('first_name'),
                FilamentFullCalendarPlugin::make()
//                    ->schedulerLicenseKey(null)
                    ->selectable(false)
                    ->editable(false)
                    ->timezone('AST')
                    ->locale('en')
                    ->plugins(['dayGrid', 'timeGrid'], true)
                    ->config([]),

            ])
            ->navigationItems([
                // NavigationItem::make('Chat')
                //     ->icon('heroicon-o-chat-bubble-left-right')
                //     ->url('/chat')
                //     ->badge(function () {
                //         $messages = ChMessage::where('to_id', Auth::id())->where('seen', false)->count();
                //         return $messages > 0 ? $messages : null;
                //     })
                //     ->badgeTooltip(function () {
                //         $messages = ChMessage::where('to_id', Auth::id())->where('seen', false)->count();
                //         return "You have {$messages} unread messages";
                //     })
                //     ->sort(0),
                // NavigationItem::make('livefeed')
                // ->icon('heroicon-o-arrow-path-rounded-square')
                // ->url('/livefeed'),
                NavigationItem::make('homepage')
                    ->label(__('homepage'))
                    ->icon('heroicon-o-arrow-uturn-up')
                    ->url('/')
                    ->sort(-1),
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('60s')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,

                EnsureUserIsSubscribed::class,

            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->assets([
                // Css::make('style', 'css/chatify/style.css'),
                // Js::make('code', 'public/js/chatify/code.js'),
            ])
            ->sidebarCollapsibleOnDesktop(true)
            ->spa()
            ->spaUrlExceptions(fn (): array => [
                url('/admin/chat'),
                url('/admin/livefeed'),
            ])
            ->globalSearchFieldSuffix(fn (): ?string => match (Platform::detect()) {
                Platform::Windows, Platform::Linux => 'CTRL+K',
                Platform::Mac => '⌘K',
                default => null,

            });
    }

    public function register(): void
    {
        parent::register();
        FilamentView::registerRenderHook(
            'panels::body.end',
            fn (): string => Blade::render("@vite('resources/js/app.js')"),
        );
        FilamentView::registerRenderHook(
            PanelsRenderHook::BODY_START,
            fn (): string => '<script>const win=window,doc=document,docElem=doc.documentElement,body=doc.getElementsByTagName("body")[0],x=win.innerWidth||docElem.clientWidth||body.clientWidth;x<1024&&localStorage.setItem("isOpen","false");</script>',
        );
    }
}
