<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Catalunya - La comunitat Laravel de Catalunya</title>
    <meta name="description" content="Uneix-te a la comunitat Laravel de Catalunya. Comparteix coneixement, experiències i connecta amb altres desenvolupadors Laravel.">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Initial Theme Setup, before any content gets rendered to avoid FOUC -->
    <script>
        (function() {
            let theme = localStorage.getItem('theme') || 'dark';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-linear-to-br from-white via-red-50/30 to-orange-50/40 dark:from-zinc-950 dark:via-zinc-900 dark:to-zinc-950">
    <x-sections.header />
    
    <main class="max-w-6xl mx-auto w-full px-6 mb-12">
        <x-sections.hero />

        <div class="mt-12 flex flex-col items-center gap-16 md:gap-24">
            <x-sections.features />
    
            <x-sections.sponsors />
    
            <x-sections.join />
        </div>
    </main>

    <div class="w-full h-px bg-linear-to-r from-transparent via-zinc-300 dark:via-zinc-700 to-transparent"></div>

    <x-sections.footer />
</body>
</html>
