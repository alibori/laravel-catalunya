<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Filament\Resources\JobPostings\JobPostingResource;
use App\Filament\Resources\CommunityPackages\CommunityPackageResource;
use App\Filament\Resources\Meetups\MeetupResource;
use App\Filament\Resources\Workshops\WorkshopResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Override;

final class AppPanelProvider extends PanelProvider
{
    #[Override]
    public function register(): void
    {
        parent::register();

        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_REGISTER_FORM_BEFORE,
            fn (): View => view('filament.panels.app.auth-register-form-before-render-hook'),
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_REGISTER_FORM_AFTER,
            fn (): View => view('filament.panels.app.auth-form-after-render-hook'),
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_LOGIN_FORM_AFTER,
            fn (): View => view('filament.panels.app.auth-form-after-render-hook'),
        );
    }
    public function panel(Panel $panel): Panel
    {
        /** @var string $panelPath */
        $panelPath = config('laravel_catalunya.filament.user_panel_path');

        return $panel
            ->id('app')
            ->path($panelPath)
            ->login()
            ->brandLogo(fn () => view('components.icons.laravel-catalunya-logo'))
            ->brandLogoHeight('4rem')
            ->registration()
            ->emailVerification()
            ->colors([
                'primary' => Color::hex('#F97316'),
                'danger'  => Color::hex('#DC2626'),
                'warning' => Color::hex('#FB923C'),
                'info'    => Color::hex('#6B7280'),
                'success' => Color::hex('#16A34A'),
                'gray'    => Color::Slate,
            ])
            ->spa()
            ->unsavedChangesAlerts()
            ->databaseNotifications()
            ->databaseNotificationsPolling('240s')
            ->resources([
                JobPostingResource::class,
                CommunityPackageResource::class,
                MeetupResource::class,
                WorkshopResource::class,
            ])
            ->discoverPages(in: app_path('Filament/App/Pages'), for: 'App\Filament\App\Pages')
            ->pages([])
            ->discoverWidgets(in: app_path('Filament/App/Widgets'), for: 'App\Filament\App\Widgets')
            ->widgets([])
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
            ])
            ->authMiddleware([
                Authenticate::class,
                'verified'
            ]);
    }
}
