<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-slate-50 to-white px-4 py-10">
        <div class="w-full max-w-md">
            {{-- Logo / Title --}}
            <div class="text-center mb-6">
                <div class="mx-auto h-12 w-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center shadow-sm">
                    <span class="text-lg font-semibold">L</span>
                </div>
                <h1 class="mt-4 text-2xl font-semibold tracking-tight text-slate-900">
                    Créer un compte
                </h1>
                <p class="mt-1 text-sm text-slate-600">
                    Rejoins LINKUP et commence à te connecter.
                </p>
            </div>

            {{-- Card --}}
            <div class="rounded-2xl border border-slate-200 bg-white/80 backdrop-blur shadow-sm p-6">
                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    {{-- Name --}}
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-slate-700" />
                        <x-text-input
                            id="name"
                            class="mt-1 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Ex: Othmane"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    {{-- Username --}}
                    <div>
                        <x-input-label for="username" :value="__('Username')" class="text-slate-700" />
                        <x-text-input
                            id="username"
                            class="mt-1 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text"
                            name="username"
                            :value="old('username')"
                            required
                            autocomplete="username"
                            placeholder="Ex: othmane.dev"
                        />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

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
                            autocomplete="email"
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
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    {{-- Confirm Password --}}
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-slate-700" />
                        <x-text-input
                            id="password_confirmation"
                            class="mt-1 block w-full rounded-xl border-slate-200 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    {{-- Actions --}}
                    <div class="pt-2 space-y-3">
                        <x-primary-button class="w-full justify-center rounded-xl py-3">
                            {{ __('Register') }}
                        </x-primary-button>

                        <div class="text-center text-sm text-slate-600">
                            Déjà inscrit ?
                            <a
                                class="font-medium text-indigo-600 hover:text-indigo-700 underline underline-offset-4"
                                href="{{ route('login') }}"
                            >
                                Se connecter
                            </a>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Footer --}}
            <p class="mt-6 text-center text-xs text-slate-500">
                En créant un compte, tu acceptes nos conditions d’utilisation.
            </p>
        </div>
    </div>
</x-guest-layout>
