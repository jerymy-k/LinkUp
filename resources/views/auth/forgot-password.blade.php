<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-slate-50 to-white px-4 py-10">
        <div class="w-full max-w-md">

            {{-- Header --}}
            <div class="text-center mb-6">
                <div class="mx-auto h-12 w-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center shadow-sm">
                    <span class="text-lg font-semibold">L</span>
                </div>
                <h1 class="mt-4 text-2xl font-semibold tracking-tight text-slate-900">
                    Mot de passe oublié
                </h1>
                <p class="mt-1 text-sm text-slate-600">
                    Entre ton email et on t’envoie un lien de réinitialisation.
                </p>
            </div>

            {{-- Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Card --}}
            <div class="rounded-2xl border border-slate-200 bg-white/80 backdrop-blur shadow-sm p-6">
                <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                    @csrf

                    {{-- Email --}}
                    <div>
                        <x-input-label for="email" :value="__('Email')" class="text-slate-700" />
                        <x-text-input
                            id="email"
                            class="mt-1 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autofocus
                            placeholder="Ex: othmane@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Actions --}}
                    <div class="pt-2 space-y-3">
                        <x-primary-button class="w-full justify-center rounded-xl py-3">
                            Envoyer le lien
                        </x-primary-button>

                        <div class="text-center text-sm text-slate-600">
                            Tu te rappelles du mot de passe ?
                            <a
                                href="{{ route('login') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-700 underline underline-offset-4"
                            >
                                Retour à la connexion
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Footer --}}
            <p class="mt-6 text-center text-xs text-slate-500">
                Si tu ne reçois rien, vérifie tes spams ou réessaie.
            </p>
        </div>
    </div>
</x-guest-layout>
