<section class="w-full">
    <header class="text-center">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your profile details.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6 w-full">
        @csrf
        @method('patch')

        {{-- Cover block (Banner + Avatar) --}}
        <div class="rounded-xl border border-gray-200 overflow-hidden bg-white">
            <div class="h-32 bg-gray-100 relative">
                @if($user->banner)
                    <img src="{{ $user->banner }}" alt="Banner" class="h-32 w-full object-cover">
                    <div class="absolute inset-0 bg-black/25"></div>
                @else
                    <div class="absolute inset-0 bg-gradient-to-r from-indigo-100 to-slate-100"></div>
                @endif
            </div>

            <div class="px-5 pb-5 -mt-10 flex items-end gap-4 relative z-10">
                <div class="h-20 w-20 rounded-2xl bg-white border border-gray-200 overflow-hidden shadow-sm">
                    <img
                        src="{{ $user->avatar ?: 'https://i.pravatar.cc/150?img=12' }}"
                        alt="Avatar"
                        class="h-20 w-20 object-cover"
                    >
                </div>

                <div class="min-w-0 pb-1">
                    <p class="font-semibold text-gray-900 truncate">
                        {{ $user->username ?? $user->name }}
                    </p>
                    <p class="text-sm text-gray-600 truncate">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        {{-- Username --}}
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input
                id="username"
                name="username"
                type="text"
                class="mt-1 block w-full"
                :value="old('username', $user->username)"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        {{-- First & Last name --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="first_name" :value="__('First name')" />
                <x-text-input
                    id="first_name"
                    name="first_name"
                    type="text"
                    class="mt-1 block w-full"
                    :value="old('first_name', $user->first_name)"
                    autocomplete="given-name"
                />
                <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Last name')" />
                <x-text-input
                    id="last_name"
                    name="last_name"
                    type="text"
                    class="mt-1 block w-full"
                    :value="old('last_name', $user->last_name)"
                    autocomplete="family-name"
                />
                <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
            </div>
        </div>

        {{-- Name --}}
        <div>
            <x-input-label for="name" :value="__('Name (display)')" />
            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                :value="old('name', $user->name)"
                required
                autocomplete="name"
            />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        {{-- Bio --}}
        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea
                id="bio"
                name="bio"
                rows="4"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                placeholder="Tell people about you..."
            >{{ old('bio', $user->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        {{-- Avatar + Banner URLs --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="avatar" :value="__('Avatar URL')" />
                <x-text-input
                    id="avatar"
                    name="avatar"
                    type="text"
                    class="mt-1 block w-full"
                    :value="old('avatar', $user->avatar)"
                    placeholder="https://..."
                />
                <x-input-error class="mt-2" :messages="$errors->get('avatar')" />
            </div>

            <div>
                <x-input-label for="banner" :value="__('Banner URL')" />
                <x-text-input
                    id="banner"
                    name="banner"
                    type="text"
                    class="mt-1 block w-full"
                    :value="old('banner', $user->banner)"
                    placeholder="https://..."
                />
                <x-input-error class="mt-2" :messages="$errors->get('banner')" />
            </div>
        </div>

        {{-- Email --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                :value="old('email', $user->email)"
                required
                autocomplete="email"
            />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button
                            form="send-verification"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
