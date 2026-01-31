<x-layouts.guest>
    <x-slot name="title">Meetups</x-slot>

    <section class="mt-12">
        <x-texts.title tag="h1" class="text-3xl lg:text-4xl font-bold text-center mb-12">
            Proper Meetup
        </x-texts.title>

        @if ($meetup)
            <div class="max-w-2xl mx-auto">
                <x-card>
                    <div class="flex flex-col gap-6">
                        <div>
                            <x-texts.title tag="h2" class="text-2xl lg:text-3xl font-bold">
                                {{ $meetup->title }}
                            </x-texts.title>
                        </div>

                        @if ($meetup->description)
                            <x-texts.paragraph>
                                {{ $meetup->description }}
                            </x-texts.paragraph>
                        @endif

                        <div class="flex flex-col gap-4">
                            <div class="flex items-center gap-3">
                                <x-icons.calendar class="size-5 text-red-600 dark:text-red-500 shrink-0" />
                                <span class="text-zinc-700 dark:text-zinc-300">
                                    {{ $meetup->scheduled_at->translatedFormat('l, d F Y - H:i') }} ({{ $meetup->timezone->value }})
                                </span>
                            </div>

                            <div class="flex items-center gap-3">
                                <x-icons.location-pin class="size-5 text-red-600 dark:text-red-500 shrink-0" />
                                <span class="text-zinc-700 dark:text-zinc-300">
                                    {{ $meetup->location }}
                                </span>
                            </div>
                        </div>
                    </div>
                </x-card>
            </div>
        @else
            <div class="max-w-2xl mx-auto text-center">
                <x-card>
                    <div class="flex flex-col items-center gap-4">
                        <x-icons.calendar class="size-12 text-zinc-400 dark:text-zinc-600" />
                        <x-texts.paragraph>
                            Encara no hi ha cap meetup programat. Torna aviat!
                        </x-texts.paragraph>
                    </div>
                </x-card>
            </div>
        @endif
    </section>
</x-layouts.guest>
