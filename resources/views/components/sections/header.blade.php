<header class="sticky z-10 top-0 left-0 px-4 lg:px-6 py-3 lg:py-4 w-full bg-transparent backdrop-blur max-w-7xl mx-auto" x-data="{ mobileMenuOpen: false }">
    <nav class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <x-icons.laravel />
            <span class="text-lg lg:text-xl font-bold text-zinc-900 dark:text-white hidden md:block">
                <a href="{{ route('home') }}">
                    Laravel Catalunya
                </a>
            </span>
        </div>

        <!-- Desktop Navigation -->
        <div class="hidden md:flex items-center gap-2 lg:gap-3">
            @if (Route::has('filament.app.auth.login'))
                <div class="flex items-center gap-2 lg:gap-3">
                    @auth
                        <a href="{{ url('/'.config('laravel_catalunya.filament.user_panel_path')) }}">
                            <x-buttons.tertiary>
                                Dashboard
                            </x-buttons.tertiary>
                        </a>
                    @else
                        <a href="{{ route('filament.app.auth.login') }}" class="text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white transition-colors">
                            <x-buttons.tertiary>
                                {{ __('Log in') }}
                            </x-buttons.tertiary>
                        </a>
                        @if (Route::has('filament.app.auth.register'))
                            <a href="{{ route('filament.app.auth.register') }}">
                                <x-buttons.primary>
                                    {{ __('Register') }}
                                </x-buttons.primary>
                            </a>
                        @endif
                    @endauth
                </div>
            @endif

            <a href="https://t.me/laravelcatalunya" target="_blank" rel="noopener noreferrer">
                <x-buttons.secondary>
                    <x-icons.telegram />
                </x-buttons.secondary>
            </a>
            <a href="https://github.com/alibori/laravel-catalunya" target="_blank" rel="noopener noreferrer">
                <x-buttons.secondary>
                    <x-icons.github />
                </x-buttons.secondary>
            </a>
            <x-theme />
        </div>

        <!-- Mobile Menu Button -->
        <button
            @click="mobileMenuOpen = !mobileMenuOpen"
            class="md:hidden p-2 text-zinc-700 dark:text-zinc-300 hover:text-red-600 dark:hover:text-red-500 transition-colors"
            aria-label="Toggle menu"
        >
            <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg x-show="mobileMenuOpen" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div
        x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.away="mobileMenuOpen = false"
        x-cloak
        class="md:hidden mt-4 bg-white/95 dark:bg-zinc-900/95 backdrop-blur-lg rounded-2xl border border-zinc-200/50 dark:border-zinc-700/50 shadow-xl overflow-hidden"
    >
        <div class="flex flex-col p-4 gap-2">
            @if (Route::has('filament.app.auth.login'))
                @auth
                    <a href="{{ url('/'.config('laravel_catalunya.filament.user_panel_path')) }}">
                        <x-buttons.tertiary>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                            Dashboard
                        </x-buttons.tertiary>
                    </a>
                @else
                    <a href="{{ route('filament.app.auth.login') }}">
                        <x-buttons.tertiary>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            {{ __('Log in') }}
                        </x-buttons.tertiary>
                    </a>
                    @if (Route::has('filament.app.auth.register'))
                        <a href="{{ route('filament.app.auth.register') }}">
                            <x-buttons.primary>
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                                </svg>
                                {{ __('Register') }}
                            </x-buttons.primary>
                        </a>
                    @endif
                @endauth
            @endif

            <a href="https://t.me/laravelcatalunya" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800 rounded-lg transition-all duration-200">
                <x-icons.telegram />
                <span>Telegram</span>
            </a>
            <a href="https://github.com/alibori/laravel-catalunya" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 px-4 py-3 text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-zinc-900 dark:hover:text-white hover:bg-zinc-50 dark:hover:bg-zinc-800 rounded-lg transition-all duration-200">
                <x-icons.github />
                <span>GitHub</span>
            </a>
            <div class="px-4 py-3">
                <x-theme />
            </div>
        </div>
    </div>
</header>
