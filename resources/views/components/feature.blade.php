<x-card>
    <div class="flex flex-col md:flex-row gap-4 md:items-center mb-4">
        <div class="size-12 bg-red-100 dark:bg-red-950 rounded-xl flex items-center justify-center shrink-0">
            {{ $icon }}
        </div>
        <x-texts.title tag="h3" class="text-xl font-semibold">
            {{ $title }}
        </x-texts.title>
    </div>
    <x-texts.paragraph>
        {{ $description }}
    </x-texts.paragraph>
</x-card>