@props(['meetup'])

<div class="p-6 bg-white/50 dark:bg-zinc-900/50 rounded-xl border border-zinc-200 dark:border-zinc-800 hover:bg-white dark:hover:bg-zinc-900 transition-colors">
    <div class="flex flex-col gap-4">
        <div>
            <x-texts.title tag="h3" class="text-lg font-semibold">
                {{ $meetup->title }}
            </x-texts.title>
        </div>

        <div class="flex flex-col gap-2 text-sm">
            <div class="flex items-center gap-2">
                <x-icons.calendar class="size-4 text-red-600 dark:text-red-500 shrink-0" />
                <span class="text-zinc-600 dark:text-zinc-400">
                    {{ $meetup->scheduled_at->translatedFormat('d F Y - H:i') }}
                </span>
            </div>

            <div class="flex items-center gap-2">
                <x-icons.location-pin class="size-4 text-red-600 dark:text-red-500 shrink-0" />
                <span class="text-zinc-600 dark:text-zinc-400">
                    {{ $meetup->location }}
                </span>
            </div>
        </div>
    </div>
</div>
