<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use App\Filament\Resources\JobPostings\JobPostingResource;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Illuminate\Contracts\View\View;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

final class AppPanelProvider extends PanelProvider
{
    public function register(): void
    {
        parent::register();

        FilamentView::registerRenderHook(
            PanelsRenderHook::AUTH_REGISTER_FORM_BEFORE,
            fn (): View => view('filament.panels.app.auth-register-form-before-render-hook'),
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
            ->registration()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->resources([
                JobPostingResource::class,
            ])
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/App/Widgets'), for: 'App\Filament\App\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
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
            ]);
    }
}
