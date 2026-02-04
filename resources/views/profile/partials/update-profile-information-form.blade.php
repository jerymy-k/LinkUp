<section class="p-6 space-y-6">

    <header>
        <h2 class="text-xl font-bold">Profile information</h2>
        <p class="text-sm text-[#994d51]">
            Update your account's profile information and email address.
        </p>
    </header>

    {{-- Banner --}}
    <div class="relative h-40 rounded-xl   bg-[#f3e7e8]">
        @if(auth()->user()->banner)
            <img src="{{ auth()->user()->banner }}" class="w-full h-full object-cover rounded-lg">
            <div class="absolute inset-0 bg-black/30 rounded-lg"></div>
        @endif

        <div class="absolute -bottom-8 left-6">
            <div class="h-20 w-20 rounded-full border-4 border-white bg-[#f3e7e8] overflow-hidden">
                <img src="{{ auth()->user()->avatar ?: 'https://i.pravatar.cc/150?img=12' }}"
                     class="h-full w-full object-cover">
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('profile.update') }}" class="pt-10 space-y-5">
        @csrf
        @method('patch')

        <div>
            <x-input-label value="Username" />
            <x-text-input name="username" class="mt-1 w-full"
                :value="old('username', auth()->user()->username)" required />
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <x-input-label value="First name" />
                <x-text-input name="first_name" class="mt-1 w-full"
                    :value="old('first_name', auth()->user()->first_name)" />
            </div>

            <div>
                <x-input-label value="Last name" />
                <x-text-input name="last_name" class="mt-1 w-full"
                    :value="old('last_name', auth()->user()->last_name)" />
            </div>
        </div>

        <div>
            <x-input-label value="Display name" />
            <x-text-input name="name" class="mt-1 w-full"
                :value="old('name', auth()->user()->name)" required />
        </div>

        <div>
            <x-input-label value="Bio" />
            <textarea name="bio" rows="4"
                class="mt-1 w-full rounded-lg border-[#f3e7e8] focus:ring-[#ea2a33]/40">
                {{ old('bio', auth()->user()->bio) }}
            </textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
            <div>
                <x-input-label value="Avatar URL" />
                <x-text-input name="avatar" class="mt-1 w-full"
                    :value="old('avatar', auth()->user()->avatar)" />
            </div>

            <div>
                <x-input-label value="Banner URL" />
                <x-text-input name="banner" class="mt-1 w-full"
                    :value="old('banner', auth()->user()->banner)" />
            </div>
        </div>

        <div>
            <x-input-label value="Email" />
            <x-text-input name="email" type="email" class="mt-1 w-full"
                :value="old('email', auth()->user()->email)" required />
        </div>

        <div class="flex items-center gap-4">
            <button class="px-5 py-2 bg-[#ea2a33] text-white rounded-lg font-bold hover:opacity-90">
                Save changes
            </button>

            @if (session('status') === 'profile-updated')
                <span class="text-sm text-green-600">Saved ✔</span>
            @endif
        </div>
    </form>
</section>
