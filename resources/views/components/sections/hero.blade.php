<section id="hero" class="text-center h-dvh -mt-16 flex flex-col items-center justify-center relative">
    <h1 class="text-5xl lg:text-7xl font-bold text-zinc-900 dark:text-white leading-tight mb-8">
        Benvinguts a
        <span class="text-transparent bg-clip-text bg-linear-to-r from-red-600 via-orange-500 to-red-600">
            Laravel Catalunya
        </span>
    </h1>
    <x-texts.paragraph class="text-lg lg:text-xl">
        La nova comunitat Laravel de Catalunya. Comparteix coneixement, experiències i connecta amb altres desenvolupadors apassionats per l'ecosistema Laravel.
    </x-texts.paragraph>
    <x-scroll-down class="absolute bottom-4 transition-opacity duration-300" x-data="chevron()" x-bind:class="{ 'opacity-0': !show }" />
</section>