<header x-data="{ mobileMenuOpen: false }"
    class="sticky z-10 top-0 left-0 px-4 lg:px-6 py-3 lg:py-4 w-full bg-transparent backdrop-blur max-w-7xl mx-auto">
    <nav class="flex items-center justify-between">
        <a href="{{ route('home') }}" class="flex items-center gap-2">
            <x-icons.laravel-catalunya-logo />
        </a>

        <!-- Desktop Navigation -->
        <div class="hidden sm:flex items-center gap-2 lg:gap-3">
            <a href="{{ route('agenda') }}" class="text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-red-600 dark:hover:text-red-500 transition-colors px-3 py-2">
                Agenda
            </a>
            <a href="{{ route('community-packages') }}" class="text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-red-600 dark:hover:text-red-500 transition-colors px-3 py-2">
                Paquets
            </a>
            <a href="{{ route('companies') }}" class="text-sm font-medium text-zinc-700 dark:text-zinc-300 hover:text-red-600 dark:hover:text-red-500 transition-colors px-3 py-2">
                Empreses
            </a>

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
            <a href="https://www.youtube.com/@laravelcatalunya" target="_blank" rel="noopener noreferrer">
                <x-buttons.secondary>
                    <x-icons.youtube />
                </x-buttons.secondary>
            </a>
            <x-theme />
        </div>

        <!-- Mobile Menu Button -->
        <button x-on:click="mobileMenuOpen = !mobileMenuOpen"
            class="sm:hidden p-2 text-zinc-700 dark:text-zinc-300 hover:text-red-600 dark:hover:text-red-500 transition-colors"
            aria-label="Toggle menu">
            <x-icons.burger x-show="!mobileMenuOpen" />
            <x-icons.xmark x-show="mobileMenuOpen" x-cloak />
        </button>
    </nav>

    <!-- Mobile Menu -->
    <x-card x-show="mobileMenuOpen"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        x-on:click.away="mobileMenuOpen = false"
        x-cloak
        class="absolute top-full left-4 right-4 bg-white/95 dark:bg-zinc-900/95 backdrop-blur-lg sm:hidden p-4!">
        <div class="flex flex-col gap-2">
            <a href="{{ route('agenda') }}" class="w-full">
                <x-buttons.tertiary class="w-full justify-center">
                    <x-icons.calendar />
                    Agenda
                </x-buttons.tertiary>
            </a>
            <a href="{{ route('community-packages') }}" class="w-full">
                <x-buttons.tertiary class="w-full justify-center">
                    <x-icons.laravel />
                    Paquets
                </x-buttons.tertiary>
            </a>
            <a href="{{ route('companies') }}" class="w-full">
                <x-buttons.tertiary class="w-full justify-center">
                    <x-icons.building />
                    Empreses
                </x-buttons.tertiary>
            </a>

            @if (Route::has('filament.app.auth.login'))
                @auth
                    <a href="{{ url('/'.config('laravel_catalunya.filament.user_panel_path')) }}" class="w-full">
                        <x-buttons.tertiary class="w-full justify-center">
                            <x-icons.graph />
                            Dashboard
                        </x-buttons.tertiary>
                    </a>
                @else
                    <a href="{{ route('filament.app.auth.login') }}" class="w-full">
                        <x-buttons.tertiary class="w-full justify-center">
                            <x-icons.login />
                            {{ __('Log in') }}
                        </x-buttons.tertiary>
                    </a>
                    @if (Route::has('filament.app.auth.register'))
                        <a href="{{ route('filament.app.auth.register') }}" class="w-full">
                            <x-buttons.primary class="w-full justify-center">
                                <x-icons.add-user />
                                {{ __('Register') }}
                            </x-buttons.primary>
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="grid grid-cols-2 gap-2 mt-4">
            <a href="https://t.me/laravelcatalunya" target="_blank" rel="noopener noreferrer" class="w-full">
                <x-buttons.secondary class="w-full justify-center">
                    <x-icons.telegram />
                    Telegram
                </x-buttons.secondary>
            </a>

            <a href="https://github.com/alibori/laravel-catalunya" target="_blank" rel="noopener noreferrer" class="w-full">
                <x-buttons.secondary class="w-full justify-center">
                    <x-icons.github />
                    GitHub
                </x-buttons.secondary>
            </a>

            <a href="https://www.youtube.com/@laravelcatalunya" target="_blank" rel="noopener noreferrer" class="w-full">
                <x-buttons.secondary class="w-full justify-center">
                    <x-icons.youtube />
                    YouTube
                </x-buttons.secondary>
            </a>

            <div class="w-full">
                <x-theme :desc="true" class="w-full" />
            </div>
        </div>
    </x-card>
</header>
