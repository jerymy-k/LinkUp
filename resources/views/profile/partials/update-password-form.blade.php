<section class="p-6 space-y-6">

    <header>
        <h2 class="text-xl font-bold">Update password</h2>
        <p class="text-sm text-[#994d51]">
            Make sure your account uses a long, random password.
        </p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
        @csrf
        @method('put')

        <div>
            <x-input-label value="Current password" />
            <x-text-input type="password" name="current_password" class="mt-1 w-full" />
        </div>

        <div>
            <x-input-label value="New password" />
            <x-text-input type="password" name="password" class="mt-1 w-full" />
        </div>

        <div>
            <x-input-label value="Confirm password" />
            <x-text-input type="password" name="password_confirmation" class="mt-1 w-full" />
        </div>

        <button class="px-5 py-2 bg-[#ea2a33] text-white rounded-lg font-bold hover:opacity-90">
            Update password
        </button>

        @if (session('status') === 'password-updated')
            <p class="text-sm text-green-600">Password updated ✔</p>
        @endif
    </form>
</section>
