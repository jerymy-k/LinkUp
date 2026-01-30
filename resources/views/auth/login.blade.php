<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-slate-50 to-white px-4 py-10">
        <div class="w-full max-w-md">

            {{-- Session status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            {{-- Header --}}
            <div class="text-center mb-6">
                <div class="mx-auto h-12 w-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center shadow-sm">
                    <span class="text-lg font-semibold">L</span>
                </div>
                <h1 class="mt-4 text-2xl font-semibold tracking-tight text-slate-900">
                    Connexion
                </h1>
                <p class="mt-1 text-sm text-slate-600">
                    Content de te revoir sur LINKUP 👋
                </p>
            </div>

            {{-- Card --}}
            <div class="rounded-2xl border border-slate-200 bg-white/80 backdrop-blur shadow-sm p-6">
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
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
                            autocomplete="username"
                            placeholder="Ex: othmane@email.com"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    {{-- Password --}}
                    <div>
                        <x-input-label for="password" :value="__('Password')" class="text-slate-700" />
                        <x-text-input
                            id="password"
                            class="mt-1 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Remember & Forgot --}}
                    <div class="flex items-center justify-between text-sm">
                        <label for="remember_me" class="inline-flex items-center gap-2">
                            <input
                                id="remember_me"
                                type="checkbox"
                                class="rounded border-slate-300 text-indigo-600 focus:ring-indigo-500"
                                name="remember"
                            >
                            <span class="text-slate-600">Se souvenir de moi</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a
                                href="{{ route('password.request') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-700 underline underline-offset-4"
                            >
                                Mot de passe oublié ?
                            </a>
                        @endif
                    </div>

                    {{-- Action --}}
                    <div class="pt-2 space-y-3">
                        <x-primary-button class="w-full justify-center rounded-xl py-3">
                            {{ __('Log in') }}
                        </x-primary-button>

                        <div class="text-center text-sm text-slate-600">
                            Pas encore de compte ?
                            <a
                                href="{{ route('register') }}"
                                class="font-medium text-indigo-600 hover:text-indigo-700 underline underline-offset-4"
                            >
                                S’inscrire
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Footer --}}
            <p class="mt-6 text-center text-xs text-slate-500">
                Accès sécurisé • Données protégées
            </p>
        </div>
    </div>
</x-guest-layout>
