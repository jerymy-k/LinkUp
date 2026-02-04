<section class="p-6 space-y-6">

    <header>
        <h2 class="text-xl font-bold text-red-600">Delete account</h2>
        <p class="text-sm text-[#994d51]">
            Once deleted, all data will be permanently removed.
        </p>
    </header>

    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('delete')

        <div class="mb-4">
            <x-input-label value="Confirm password" />
            <x-text-input type="password" name="password" class="mt-1 w-full" />
        </div>

        <button class="px-5 py-2 bg-red-600 text-white rounded-lg font-bold hover:bg-red-700">
            Delete my account
        </button>
    </form>
</section>
