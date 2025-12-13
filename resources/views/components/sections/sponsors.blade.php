<section>
    <x-texts.title tag="h2" class="text-center text-3xl lg:text-4xl font-bold mb-4">
        Patrocinadors
    </x-texts.title>

    <x-texts.paragraph class="text-center text-lg max-w-2xl mx-auto mb-12">
        Laravel Catalunya és possible gràcies al suport de patrocinadors que creuen en la comunitat i el creixement del coneixement compartit.
    </x-texts.paragraph>

    <x-card>
        <div class="mx-auto size-16 bg-red-100 dark:bg-red-950 rounded-xl flex items-center justify-center shrink-0 mb-6">
            <x-icons.heart class="text-red-600 dark:text-red-500" />
        </div>

        <x-texts.title tag="h3" class="text-2xl font-bold text-center mb-4">
            Sigues el primer patrocinador
        </x-texts.title>

        <x-texts.paragraph class="text-center max-w-md mx-auto mb-8">
            Ajuda'ns a créixer i a organitzar esdeveniments, meetups i recursos per a la comunitat Laravel de Catalunya.
        </x-texts.paragraph>

        <a href="mailto:hola@laravelcatalunya.online?subject=Patrocini%20Laravel%20Catalunya" aria-label="Email">
            <x-buttons.secondary class="mb-8 mx-auto">
                <x-icons.mail />
                Converteix-te en patrocinador
            </x-buttons.secondary>
        </a>

        <div class="pt-8 border-t border-zinc-200/50 dark:border-zinc-700/50">
            <x-texts.paragraph class="text-center text-sm mb-4">
                Beneficis del patrocini:
            </x-texts.paragraph>
            <div class="flex flex-wrap justify-center gap-3">
                <x-tag>
                    <x-icons.check class="text-red-600 dark:text-red-500" />
                    Visibilitat al web
                </x-tag>
                <x-tag>
                    <x-icons.check class="text-red-600 dark:text-red-500" />
                    Menció als esdeveniments
                </x-tag>
                <x-tag>
                    <x-icons.check class="text-red-600 dark:text-red-500" />
                    Suport a la comunitat
                </x-tag>
            </div>
        </div>
    </x-card>
</section>