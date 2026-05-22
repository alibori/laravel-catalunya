<x-layouts.guest>
    <x-slot name="title">{{ __('Companies') }}</x-slot>

    <section class="mt-12 mb-12">
        <x-texts.title tag="h1" class="text-3xl lg:text-4xl font-bold text-center mb-4">
            Qui utilitza Laravel?
        </x-texts.title>

        <div class="max-w-2xl mx-auto text-center mb-12">
            <x-texts.paragraph>
                Descobreix empreses que utilitzen Laravel al nostre territori.
                Laravel es fa servir en tot tipus de projectes i sectors, des de startups fins a grans empreses.
            </x-texts.paragraph>

            <x-card class="mt-6">
                <div class="flex flex-col items-center gap-2">
                    <x-texts.paragraph class="text-sm">
                        {{ __('Does your company use Laravel? We want to showcase it!') }}
                        {{ __('Send us an email with your company info to be added to this list.') }}
                    </x-texts.paragraph>
                    <a href="mailto:hola@laravelcatalunya.online"
                        class="text-sm font-medium text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 transition-colors">
                        hola@laravelcatalunya.online
                    </a>
                </div>
            </x-card>
        </div>

        @if ($companies->isEmpty())
            <div class="max-w-2xl mx-auto text-center">
                <x-card>
                    <div class="flex flex-col items-center gap-4">
                        <x-icons.laravel class="size-12 text-zinc-400 dark:text-zinc-600" />
                        <x-texts.paragraph>
                            Encara no hi ha cap empresa publicada. Sigues la primera!
                        </x-texts.paragraph>
                    </div>
                </x-card>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
                @foreach ($companies as $company)
                    <x-card class="flex flex-col justify-between">
                        <div>
                            @if ($company->logo_url)
                                <div class="mb-4">
                                    <img src="{{ $company->logo_url }}" alt="{{ $company->name }}" class="h-12 object-contain">
                                </div>
                            @endif
                            <x-texts.title tag="h3" class="text-lg font-semibold mb-2">
                                {{ $company->name }}
                            </x-texts.title>
                            @if ($company->industry)
                                <span class="inline-block text-xs font-medium px-2 py-1 rounded-full bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300 mb-2">
                                    {{ $company->industry }}
                                </span>
                            @endif
                            <x-texts.paragraph class="text-sm mb-4">
                                {{ Str::limit(strip_tags($company->description), 150) }}
                            </x-texts.paragraph>
                        </div>
                        <div class="flex items-start justify-between mt-4">
                            <a href="{{ route('companies.show', $company->slug) }}"
                                class="text-sm font-medium text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 transition-colors">
                                {{ __('View Company') }} &rarr;
                            </a>
                        </div>
                    </x-card>
                @endforeach
            </div>

            <div class="max-w-6xl mx-auto mt-8">
                {{ $companies->links() }}
            </div>
        @endif
    </section>
</x-layouts.guest>
