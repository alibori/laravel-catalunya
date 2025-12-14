@props(['tag' => 'h1'])

<{{ $tag }} {{ $attributes->merge(['class' => 'text-zinc-900 dark:text-white']) }}>
    {{ $slot }}
</{{ $tag }}>