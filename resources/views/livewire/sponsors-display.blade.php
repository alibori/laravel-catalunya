<div>
    @if($sponsors->isEmpty())
        {{-- No sponsors: Display recruitment card --}}
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
    @else
        {{-- Display sponsors grid --}}
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-12">
            @foreach($sponsors as $sponsor)
                <div wire:key="sponsor-{{ $sponsor->id }}" class="group">
                    <a 
                        href="{{ $sponsor->website }}" 
                        target="_blank" 
                        rel="noopener noreferrer"
                        class="flex items-center justify-center p-6 bg-white dark:bg-zinc-800 rounded-xl border border-zinc-200/50 dark:border-zinc-700/50 transition-all duration-300 hover:scale-105 hover:shadow-lg hover:border-red-500/50 dark:hover:border-red-500/50 aspect-square"
                        aria-label="Visita {{ $sponsor->name }}"
                    >
                        @if($sponsor->logo_url)
                            <img 
                                src="{{ $sponsor->logo_url }}" 
                                alt="Logo de {{ $sponsor->name }}"
                                class="max-w-full max-h-full object-contain grayscale group-hover:grayscale-0 transition-all duration-300"
                            />
                        @else
                            <span class="text-lg font-semibold text-zinc-600 dark:text-zinc-400 group-hover:text-red-600 dark:group-hover:text-red-500 transition-colors duration-300 text-center">
                                {{ $sponsor->name }}
                            </span>
                        @endif
                    </a>
                </div>
            @endforeach
        </div>

        {{-- Call to action for more sponsors --}}
        <x-card class="max-w-2xl mx-auto">
            <div class="flex flex-col items-center text-center gap-4">
                <div class="size-12 bg-red-100 dark:bg-red-950 rounded-lg flex items-center justify-center shrink-0">
                    <x-icons.heart class="text-red-600 dark:text-red-500 size-6" />
                </div>

                <div>
                    <x-texts.title tag="h3" class="text-xl font-bold mb-2">
                        Vols patrocinar-nos?
                    </x-texts.title>
                    
                    <x-texts.paragraph class="text-sm max-w-md mx-auto mb-6">
                        Ajuda'ns a seguir creixent i a oferir més valor a la comunitat Laravel de Catalunya.
                    </x-texts.paragraph>
                </div>

                <a href="mailto:hola@laravelcatalunya.online?subject=Patrocini%20Laravel%20Catalunya" aria-label="Email">
                    <x-buttons.secondary>
                        <x-icons.mail />
                        Converteix-te en patrocinador
                    </x-buttons.secondary>
                </a>
            </div>
        </x-card>
    @endif
</div>
