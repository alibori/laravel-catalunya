<x-layouts.guest>
    <x-slot:title>
        Verificació del correu electrònic
    </x-slot:title>

    <div class="max-w-2xl mx-auto py-12 sm:py-16">

        <!-- Header -->
        <div class="mb-10 pb-6">
            <h1 class="text-4xl sm:text-5xl font-bold text-zinc-900 dark:text-white mb-4">
                Verifica el teu correu electrònic
            </h1>
            <p class="text-zinc-500 dark:text-zinc-500">
                Només és necessari un últim pas per activar el teu compte
            </p>
        </div>

        <!-- Success message -->
        @if (session('message'))
            <div class="mb-8 p-4 bg-green-50/60 dark:bg-green-950/20 border border-green-200 dark:border-green-900/40 rounded-lg">
                <p class="text-green-700 dark:text-green-400 text-sm leading-relaxed">
                    {{ session('message') }}
                </p>
            </div>
        @endif

        <!-- Main content -->
        <div class="space-y-8">

            <div class="p-6 bg-red-50/50 dark:bg-red-950/20 border border-red-100 dark:border-red-900/30 rounded-lg">
                <p class="text-zinc-700 dark:text-zinc-300 leading-relaxed">
                    Abans de continuar, has de verificar la teva adreça de correu electrònic.
                    T’hem enviat un correu amb un enllaç de verificació.
                </p>
            </div>

            <p class="text-zinc-600 dark:text-zinc-400 leading-relaxed">
                Si no has rebut el correu, comprova la carpeta de <strong>correu brossa</strong> o
                sol·licita que t’enviem un altre enllaç.
            </p>

            <!-- Actions -->
            <div class="flex flex-col sm:flex-row gap-4">

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center px-5 py-3 rounded-lg
                               bg-red-600 text-white font-semibold
                               hover:bg-red-700
                               dark:bg-red-500 dark:hover:bg-red-600
                               transition-colors"
                    >
                        Reenviar correu de verificació
                    </button>
                </form>
            </div>
        </div>

        <!-- Footer note -->
        <div class="mt-16 pt-8">
            <p class="text-sm text-zinc-500 dark:text-zinc-500 text-center">
                Si tens qualsevol problema, pots contactar amb nosaltres a
                <a href="mailto:hola@laravelcatalunya.online"
                   class="text-red-600 dark:text-red-400 hover:underline underline-offset-2">
                    hola@laravelcatalunya.online
                </a>
            </p>
        </div>
    </div>
</x-layouts.guest>
