<?php

namespace App\Providers\Filament;

use App\Filament\Clusters\Students\Resources\StudentResource;
use App\Filament\Clusters\Teachers\Resources\TeacherResource;
use App\Filament\Clusters\TrainingProviders\Resources\TrainingProviderResource;
use App\Filament\Pages\Auth\Login;
use App\Filament\Pages\Auth\Register;
use App\Filament\Resources\AnnouncementResource;
use App\Http\Middleware\EnsureUserIsSubscribed;
use App\Models\ChMessage;
use BezhanSalleh\FilamentShield\FilamentShieldPlugin;
use DutchCodingCompany\FilamentDeveloperLogins\FilamentDeveloperLoginsPlugin;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Pages\Auth\EditProfile;
use Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;
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
use Illuminate\Support\Number;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Jeffgreco13\FilamentBreezy\BreezyCore;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
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
            ->userMenuItems([
                'view' => MenuItem::make()
                    ->label('Edit Bio')
                    ->url(function (): string {
                        //user HasOne teacher
                        if (auth()->user()->teacher) {
                            return TeacherResource::getUrl('view', ['record' => auth()->user()->teacher->id]);
                        }

                        //user HasOne student
                        if (auth()->user()->student) {
                            return StudentResource::getUrl('view', ['record' => auth()->user()->student->id]);
                        }

                        //user HasOne trainingProvider
                        if (auth()->user()->trainingProvider) {
                            return TrainingProviderResource::getUrl('view', ['record' => auth()->user()->trainingProvider->id]);
                        }

                        //user HasOne contractor
                        if (auth()->user()->contractor) {
                            return \App\Filament\Clusters\Contractors\Resources\ContractorResource::getUrl('view', ['record' => auth()->user()->contractor->id]);
                        }

                        //user HasOne educationalConsultant
                        if (auth()->user()->educationalConsultant) {
                            return \App\Filament\Clusters\EducationalConsultants\Resources\EducationalConsultantResource::getUrl('view', ['record' => auth()->user()->educationalConsultant->id]);
                        }
                        //user HasOne member
                        if (auth()->user()->member) {
                            return \App\Filament\Clusters\Members\Resources\MemberResource::getUrl('view', ['record' => auth()->user()->member->id]);
                        }

                        //user HasMany schools, lets use  count
                        if (auth()->user()->schools->count() > 1) {
                            return \App\Filament\Clusters\Schools\Resources\SchoolResource::getUrl('view', ['record' => auth()->user()->schools->first()->id]);
                        }


                        return EditProfile::getUrl();
                    })
                    ->icon('heroicon-o-user-circle'),
            ])
            ->emailVerification()
            ->passwordReset()
            ->colors([
                'primary' => Color::Orange,
            ])
            ->databaseTransactions(false)
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
                FilamentShieldPlugin::make(),
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['en', 'ar']),
                BreezyCore::make()
                    ->myProfile(
                        shouldRegisterUserMenu: true,
                        shouldRegisterNavigation: false,
                        hasAvatars: true,
                        slug: 'my-profile',
                        navigationGroup: 'Settings',

                    )

                    ->myProfileComponents([
                        'personal_info' => \App\Livewire\CustomPersonalInfo::class,
                        'subscription' => \App\Livewire\SubscriptionDetails::class,
                        // 'professional_info' => \App\Livewire\ProfessionalInfo::class,
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
                    ->selectable(true)
                    ->editable(true)
                    ->timezone('GMT+3')
                    ->locale('en')
                    ->plugins(['dayGrid', 'timeGrid'], true)
                    ->config([]),
                \RickDBCN\FilamentEmail\FilamentEmail::make(),

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
            ->authGuard('web')
            ->assets([
                // Css::make('style', 'css/chatify/style.css'),
                // Js::make('code', 'public/js/chatify/code.js'),
            ])
            ->sidebarCollapsibleOnDesktop(true)
            ->spa(true)
            ->spaUrlExceptions(fn (): array => [
                url('/admin/chat'),
                url('/admin/livefeed'),
            ])
            ->globalSearchKeyBindings([
                'command+k',
                'ctrl+k',
            ])
            ->globalSearchDebounce('750ms')
            ->globalSearchFieldSuffix(fn (): ?string => match (Platform::detect()) {
                Platform::Windows => 'CTRL+K',
                Platform::Linux => 'CTRL+K',
                Platform::Mac => '⌘+K',
                default => null,
            })
            ->unsavedChangesAlerts(true);
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
