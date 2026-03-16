<x-layouts.guest>
    <x-slot name="title">Agenda</x-slot>

    <section class="mt-12 mb-12">
        <x-texts.title tag="h1" class="text-3xl lg:text-4xl font-bold text-center mb-12">
            Agenda de la Comunitat
        </x-texts.title>

        @if ($events->isEmpty())
            <div class="max-w-2xl mx-auto text-center">
                <x-card>
                    <div class="flex flex-col items-center gap-4">
                        <x-icons.calendar class="size-12 text-zinc-400 dark:text-zinc-600" />
                        <x-texts.paragraph>
                            Encara no hi ha cap esdeveniment programat. Torna aviat!
                        </x-texts.paragraph>
                    </div>
                </x-card>
            </div>
        @else
            <div class="max-w-3xl mx-auto">
                <div class="relative">
                    {{-- Vertical timeline line --}}
                    <div class="absolute left-4 md:left-1/2 top-0 bottom-0 w-0.5 bg-zinc-300 dark:bg-zinc-700 -translate-x-1/2"></div>

                    @foreach ($events as $event)
                        <x-agenda-timeline-item
                            :event="$event"
                            :isFuture="$event->scheduled_at->isFuture()"
                            :alignRight="$loop->even"
                        />
                    @endforeach
                </div>
            </div>
        @endif
    </section>
</x-layouts.guest>
