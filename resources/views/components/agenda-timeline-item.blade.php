@props(['event', 'isFuture' => false, 'alignRight' => false])

<div x-data="{ open: false }" class="relative mb-8 last:mb-0">
    {{-- Timeline dot --}}
    <div class="absolute left-4 md:left-1/2 -translate-x-1/2 top-5 z-10">
        <div @class([
            'size-4 rounded-full border-2 shadow-sm',
            'bg-red-500 border-red-600' => $isFuture && $event->event_type === 'meetup',
            'bg-orange-500 border-orange-600' => $isFuture && $event->event_type === 'workshop',
            'bg-zinc-400 border-zinc-500 dark:bg-zinc-600 dark:border-zinc-500' => !$isFuture,
        ])></div>
    </div>

    {{-- Content card --}}
    <div @class([
        'ml-10 md:ml-0 md:w-[calc(50%-1.5rem)]',
        'md:mr-auto' => !$alignRight,
        'md:ml-auto' => $alignRight,
    ])>
        <button
            x-on:click="open = !open"
            class="w-full text-left p-4 bg-white/50 dark:bg-zinc-900/50 rounded-xl border border-zinc-200 dark:border-zinc-800 hover:bg-white dark:hover:bg-zinc-900 transition-colors cursor-pointer"
        >
            <div class="flex items-start justify-between gap-3">
                <div class="flex flex-col gap-2 min-w-0">
                    {{-- Type badge --}}
                    <span @class([
                        'inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium w-fit',
                        'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400' => $event->event_type === 'meetup',
                        'bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400' => $event->event_type === 'workshop',
                    ])>
                        {{ $event->event_type === 'meetup' ? 'Meetup' : 'Workshop' }}
                    </span>

                    {{-- Title --}}
                    <x-texts.title tag="h3" class="text-lg font-semibold">
                        {{ $event->title }}
                    </x-texts.title>

                    {{-- Date + location summary --}}
                    <div class="flex flex-col gap-1 text-sm">
                        <div class="flex items-center gap-2">
                            <x-icons.calendar class="size-4 text-red-600 dark:text-red-500 shrink-0" />
                            <span class="text-zinc-600 dark:text-zinc-400">
                                {{ $event->scheduled_at->translatedFormat('d F Y - H:i') }}
                            </span>
                        </div>
                        <div class="flex items-center gap-2">
                            <x-icons.location-pin class="size-4 text-red-600 dark:text-red-500 shrink-0" />
                            <span class="text-zinc-600 dark:text-zinc-400 truncate">
                                {{ $event->location }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Chevron indicator --}}
                <x-icons.chevron-down
                    class="size-5 text-zinc-400 dark:text-zinc-500 shrink-0 mt-1 transition-transform duration-200"
                    x-bind:class="open ? 'rotate-180' : ''"
                />
            </div>
        </button>

        {{-- Expandable details --}}
        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-2"
            x-cloak
            class="mt-2 p-4 bg-white/50 dark:bg-zinc-900/50 rounded-xl border border-zinc-200 dark:border-zinc-800"
        >
            <div class="flex flex-col gap-4">
                @if ($event->description)
                    <div class="prose dark:prose-invert prose-sm max-w-none text-zinc-700 dark:text-zinc-300">
                        {!! $event->description !!}
                    </div>
                @endif

                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex items-center gap-2">
                        <x-icons.calendar class="size-4 text-red-600 dark:text-red-500 shrink-0" />
                        <span class="text-zinc-600 dark:text-zinc-400">
                            {{ $event->scheduled_at->translatedFormat('l, d F Y - H:i') }} ({{ $event->timezone->value }})
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-icons.location-pin class="size-4 text-red-600 dark:text-red-500 shrink-0" />
                        <span class="text-zinc-600 dark:text-zinc-400">
                            {{ $event->location }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
