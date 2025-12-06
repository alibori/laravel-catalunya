<footer class="px-4 lg:px-6 py-8 flex flex-col items-center gap-4">
    <a href="mailto:hola@laravelcatalunya.online" aria-label="Email">
        <x-buttons.tertiary>
            <x-icons.mail />
            hola@laravelcatalunya.online
        </x-buttons.tertiary>
    </a>

    <div class="text-center">
        <x-texts.paragraph class="text-sm">
            © {{ date('Y') }} Laravel Catalunya
        </x-texts.paragraph>
        <span class="text-xs text-zinc-500 dark:text-zinc-500">
            Fet amb ❤️ per la comunitat
        </span>
    </div>
</footer>