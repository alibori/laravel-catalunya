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
                            <div class="meetup-description">
                                {!! $meetup->description !!}
                            </div>
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

    @if ($pastMeetups->isNotEmpty())
        <section class="mt-16 mb-12">
            <div class="max-w-4xl mx-auto">
                <x-texts.title tag="h2" class="text-2xl lg:text-3xl font-bold text-center mb-8">
                    Meetups Anteriors
                </x-texts.title>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ($pastMeetups as $pastMeetup)
                        <x-meetup-card-simple :meetup="$pastMeetup" />
                    @endforeach
                </div>

                @if ($pastMeetups->hasPages())
                    <div class="mt-8">
                        {{ $pastMeetups->links() }}
                    </div>
                @endif
            </div>
        </section>
    @endif
</x-layouts.guest>

