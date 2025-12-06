<section>
    <x-texts.title tag="h3" class="text-3xl lg:text-4xl font-bold text-center mb-12">
        Què oferim
    </x-texts.title>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
        <x-feature>
            <x-slot name="icon">
                <x-icons.users class="text-red-600 dark:text-red-500" />
            </x-slot>
            <x-slot name="title">
                Comunitat Activa
            </x-slot>
            <x-slot name="description">
                Connecta amb desenvolupadors Laravel de Catalunya. Comparteix dubtes, experiències i aprèn dels altres.
            </x-slot>
        </x-feature>

        <x-feature>
            <x-slot name="icon">
                <x-icons.book class="text-red-600 dark:text-red-500" />
            </x-slot>
            <x-slot name="title">
                Aprenentatge
            </x-slot>
            <x-slot name="description">
                Accedeix a recursos, tutorials i bones pràctiques compartides per la comunitat en català, castellà o anglès.
            </x-slot>
        </x-feature>

        <x-feature>
            <x-slot name="icon">
                <x-icons.calendar class="text-red-600 dark:text-red-500" />
            </x-slot>
            <x-slot name="title">
                Esdeveniments
            </x-slot>
            <x-slot name="description">
                Participa en meetups, workshops i conferències organitzades per i per a la comunitat Laravel Catalunya.
            </x-slot>
        </x-feature>
    </div>
</section>
