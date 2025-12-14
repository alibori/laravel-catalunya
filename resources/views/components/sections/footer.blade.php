<footer class="px-4 lg:px-6 py-8 flex flex-col items-center gap-4">
    <a href="mailto:hola@laravelcatalunya.online" aria-label="Email">
        <x-buttons.tertiary>
            <x-icons.mail />
            hola@laravelcatalunya.online
        </x-buttons.tertiary>
    </a>

    <div class="flex gap-4 text-sm">
        <a href="{{ route('legal.terms') }}" class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100 transition-colors">
            Termes i condicions
        </a>
        <span class="text-zinc-400 dark:text-zinc-600">·</span>
        <a href="{{ route('legal.privacy') }}" class="text-zinc-600 hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100 transition-colors">
            Política de privacitat
        </a>
    </div>

    <div class="text-center">
        <x-texts.paragraph class="text-sm">
            © {{ date('Y') }} Laravel Catalunya
        </x-texts.paragraph>
        <span class="text-xs text-zinc-500 dark:text-zinc-500">
            Fet amb ❤️ per la comunitat
        </span>
    </div>
</footer>
