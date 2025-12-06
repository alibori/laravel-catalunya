<button {{ $attributes->merge(['class' => 'group text-base font-medium cursor-pointer flex items-center gap-2 px-4 py-2 rounded-lg bg-red-500 dark:bg-red-700 hover:bg-red-600 dark:hover:bg-red-800 text-white transition-colors']) }}>
    {{ $slot }}
</button>