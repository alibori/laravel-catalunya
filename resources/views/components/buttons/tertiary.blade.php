<button {{ $attributes->merge(['class' => 'group text-sm font-medium cursor-pointer flex items-center gap-2 px-4 py-2 rounded-lg bg-white dark:bg-zinc-900 border border-zinc-300 dark:border-zinc-700 text-zinc-800 dark:text-zinc-200 hover:bg-zinc-50 dark:hover:bg-zinc-800 hover:border-red-400 dark:hover:border-red-600 transition-colors']) }}>
    {{ $slot }}
</button>
