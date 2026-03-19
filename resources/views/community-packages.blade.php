<x-layouts.guest>
    <x-slot name="title">{{ __('Community Packages') }}</x-slot>

    <section class="mt-12 mb-12">
        <x-texts.title tag="h1" class="text-3xl lg:text-4xl font-bold text-center mb-4">
            Paquets de la Comunitat
        </x-texts.title>

        <div class="max-w-2xl mx-auto text-center mb-12">
            <x-texts.paragraph>
                Descobreix paquets creats i recomanats per la comunitat Laravel Catalunya.
                Si has desenvolupat un paquet que vols compartir amb la comunitat, envia'l i el revisarem!
                Junts fem créixer l'ecosistema Laravel a Catalunya.
            </x-texts.paragraph>

            @auth
                <a href="{{ url('/'.config('laravel_catalunya.filament.user_panel_path').'/community-packages/create') }}" class="inline-block mt-4">
                    <x-buttons.primary>
                        {{ __('Submit a Package') }}
                    </x-buttons.primary>
                </a>
            @else
                <a href="{{ route('filament.app.auth.register') }}" class="inline-block mt-4">
                    <x-buttons.primary>
                        {{ __('Register to Submit') }}
                    </x-buttons.primary>
                </a>
            @endauth
        </div>

        @if ($packages->isEmpty())
            <div class="max-w-2xl mx-auto text-center">
                <x-card>
                    <div class="flex flex-col items-center gap-4">
                        <x-icons.laravel class="size-12 text-zinc-400 dark:text-zinc-600" />
                        <x-texts.paragraph>
                            Encara no hi ha cap paquet publicat. Sigues el primer a compartir el teu!
                        </x-texts.paragraph>
                    </div>
                </x-card>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach ($packages as $package)
                    <x-card class="flex flex-col justify-between">
                        <div>
                            <x-texts.title tag="h3" class="text-lg font-semibold mb-2">
                                {{ $package->name }}
                            </x-texts.title>
                            <x-texts.paragraph class="text-sm mb-4">
                                {{ Str::limit(strip_tags($package->description), 150) }}
                            </x-texts.paragraph>
                        </div>
                        <div class="flex items-start justify-between mt-4">
                            <a href="{{ route('community-packages.show', $package->slug) }}"
                                class="text-sm font-medium text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 transition-colors">
                                {{ __('View Package') }} &rarr;
                            </a>
                        </div>
                    </x-card>
                @endforeach
            </div>

            <div class="max-w-6xl mx-auto mt-8">
                {{ $packages->links() }}
            </div>
        @endif
    </section>
</x-layouts.guest>
