<x-layouts.guest>
    <x-slot name="title">{{ $company->name }}</x-slot>

    <section class="mt-12 mb-12">
        <div class="max-w-3xl mx-auto">
            <a href="{{ route('companies') }}"
                class="text-sm font-medium text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 transition-colors mb-6 inline-block">
                &larr; {{ __('Back to Companies') }}
            </a>

            @if ($company->logo_url)
                <div class="mb-6">
                    <img src="{{ $company->logo_url }}" alt="{{ $company->name }}" class="h-16 object-contain">
                </div>
            @endif

            <x-texts.title tag="h1" class="text-3xl font-bold mb-4">
                {{ $company->name }}
            </x-texts.title>

            <div class="flex flex-wrap items-center gap-3 mb-6">
                @if ($company->industry)
                    <span class="inline-block text-xs font-medium px-2 py-1 rounded-full bg-red-100 text-red-700 dark:bg-red-900 dark:text-red-300">
                        {{ $company->industry }}
                    </span>
                @endif
                @if ($company->location)
                    <span class="inline-block text-xs font-medium px-2 py-1 rounded-full bg-zinc-100 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300">
                        {{ $company->location }}
                    </span>
                @endif
            </div>

            <div class="rich-content mb-6">
                {!! $company->description !!}
            </div>

            @if ($company->website)
                <div class="flex items-center gap-4">
                    <a href="{{ $company->website }}" target="_blank" rel="noopener noreferrer">
                        <x-buttons.primary>
                            {{ __('Visit Website') }} &rarr;
                        </x-buttons.primary>
                    </a>
                </div>
            @endif
        </div>
    </section>
</x-layouts.guest>
