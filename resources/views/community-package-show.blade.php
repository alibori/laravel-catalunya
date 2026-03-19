<x-layouts.guest>
    <x-slot name="title">{{ $package->name }}</x-slot>

    <section class="mt-12 mb-12">
        <div class="max-w-3xl mx-auto">
            <a href="{{ route('community-packages') }}"
                class="text-sm font-medium text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 transition-colors mb-6 inline-block">
                &larr; {{ __('Back to Packages') }}
            </a>

            <x-texts.title tag="h1" class="text-3xl font-bold mb-4">
                {{ $package->name }}
            </x-texts.title>

            <div class="rich-content mb-6">
                {!! $package->description !!}
            </div>

            <div class="flex items-center gap-4">
                <a href="{{ $package->url }}" target="_blank" rel="noopener noreferrer">
                    <x-buttons.primary>
                        {{ __('Visit Package') }} &rarr;
                    </x-buttons.primary>
                </a>
            </div>
        </div>
    </section>
</x-layouts.guest>
