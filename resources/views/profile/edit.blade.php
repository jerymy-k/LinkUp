<x-app-layout>
    <x-slot name="header">
        Profile
    </x-slot>

    {{-- FULL WIDTH WRAPPER (no max-w, no mx-auto) --}}
    <div class="w-full space-y-6">

        {{-- PROFILE INFORMATION --}}
        <section class="bg-white shadow rounded-xl overflow-hidden">

            {{-- Banner --}}
            <div class="relative h-40 bg-gray-200">
                @if(auth()->user()->banner)
                    <img
                        src="{{ auth()->user()->banner }}"
                        class="h-40 w-full object-cover"
                        alt="Banner"
                    >
                    <div class="absolute inset-0 bg-black/30"></div>
                @else
                    <div class="h-40 w-full bg-gradient-to-r from-indigo-200 to-slate-200"></div>
                @endif

                {{-- Avatar --}}
                <div class="absolute -bottom-10 left-6">
                    <div class="h-24 w-24 rounded-2xl bg-white border border-gray-300 overflow-hidden shadow">
                        <img
                            src="{{ auth()->user()->avatar ?: 'https://i.pravatar.cc/150?img=12' }}"
                            class="h-24 w-24 object-cover"
                            alt="Avatar"
                        >
                    </div>
                </div>
            </div>

            {{-- User info --}}
            <div class="pt-14 px-6 pb-6">
                <h2 class="text-xl font-semibold">
                    {{ auth()->user()->username ?? auth()->user()->name }}
                </h2>
                <p class="text-sm text-gray-500">{{ auth()->user()->email }}</p>
            </div>

            {{-- FORM --}}
            <form method="POST" action="{{ route('profile.update') }}" class="px-6 pb-6 space-y-6">
                @csrf
                @method('patch')

                {{-- Username --}}
                <div>
                    <x-input-label for="username" value="Username" />
                    <x-text-input
                        id="username"
                        name="username"
                        class="mt-1 block w-full"
                        :value="old('username', auth()->user()->username)"
                        required
                    />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>

                {{-- First / Last name --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="first_name" value="First name" />
                        <x-text-input
                            id="first_name"
                            name="first_name"
                            class="mt-1 block w-full"
                            :value="old('first_name', auth()->user()->first_name)"
                        />
                    </div>

                    <div>
                        <x-input-label for="last_name" value="Last name" />
                        <x-text-input
                            id="last_name"
                            name="last_name"
                            class="mt-1 block w-full"
                            :value="old('last_name', auth()->user()->last_name)"
                        />
                    </div>
                </div>

                {{-- Display name --}}
                <div>
                    <x-input-label for="name" value="Name (display)" />
                    <x-text-input
                        id="name"
                        name="name"
                        class="mt-1 block w-full"
                        :value="old('name', auth()->user()->name)"
                        required
                    />
                </div>

                {{-- Bio --}}
                <div>
                    <x-input-label for="bio" value="Bio" />
                    <textarea
                        id="bio"
                        name="bio"
                        rows="4"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                    >{{ old('bio', auth()->user()->bio) }}</textarea>
                </div>

                {{-- Avatar / Banner URLs --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="avatar" value="Avatar URL" />
                        <x-text-input
                            id="avatar"
                            name="avatar"
                            class="mt-1 block w-full"
                            :value="old('avatar', auth()->user()->avatar)"
                            placeholder="https://..."
                        />
                    </div>

                    <div>
                        <x-input-label for="banner" value="Banner URL" />
                        <x-text-input
                            id="banner"
                            name="banner"
                            class="mt-1 block w-full"
                            :value="old('banner', auth()->user()->banner)"
                            placeholder="https://..."
                        />
                    </div>
                </div>

                {{-- Email --}}
                <div>
                    <x-input-label for="email" value="Email" />
                    <x-text-input
                        id="email"
                        name="email"
                        type="email"
                        class="mt-1 block w-full"
                        :value="old('email', auth()->user()->email)"
                        required
                    />
                </div>

                {{-- Save --}}
                <div class="flex items-center gap-4">
                    <x-primary-button>Save</x-primary-button>

                    @if (session('status') === 'profile-updated')
                        <span class="text-sm text-green-600">Saved</span>
                    @endif
                </div>
            </form>
        </section>

        {{-- PASSWORD + DELETE --}}
        {{-- Password centered --}}
<div class="w-full flex justify-center">
    <div class="w-full max-w-2xl">
        @include('profile.partials.update-password-form')
    </div>
</div>

{{-- Delete below, full width --}}
{{-- Delete centered --}}
<div class="w-full flex justify-center">
    <div class="w-full max-w-2xl">
        @include('profile.partials.delete-user-form')
    </div>
</div>
</x-app-layout>
