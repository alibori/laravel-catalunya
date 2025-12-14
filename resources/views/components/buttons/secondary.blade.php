<button {{ $attributes->merge(['class' => 'group text-base font-medium cursor-pointer flex items-center gap-2 px-4 py-2 rounded-lg bg-zinc-100 dark:bg-zinc-800 hover:bg-red-100 dark:hover:bg-red-950 text-zinc-700 dark:text-zinc-300 hover:text-red-600 dark:hover:text-red-500 transition-colors']) }}>
    {{ $slot }}
</button>