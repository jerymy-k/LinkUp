<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <h2 class="font-semibold text-lg text-gray-900">Créer un post</h2>

            <a href="{{ route('dashboard') }}" class="text-sm font-semibold text-red-600 hover:underline">
                Retour
            </a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto">
        @if(session('success'))
            <div class="mb-4 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border border-[#f3e7e8] bg-white p-6 shadow-sm">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-[#1b0e0e]">Contenu</label>
                    <textarea
                        name="content"
                        rows="4"
                        class="mt-2 w-full rounded-xl border border-[#e7d0d1] bg-[#f8f6f6] px-4 py-3 text-sm focus:border-red-500 focus:ring-red-500"
                        placeholder="Écris quelque chose..."
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-[#1b0e0e]">Image (optionnel)</label>
                    <input
                        type="file"
                        name="image"
                        class="mt-2 block w-full text-sm file:mr-4 file:rounded-xl file:border-0 file:bg-red-600 file:px-4 file:py-2 file:text-white hover:file:bg-red-700"
                    />
                    @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full rounded-xl bg-red-600 px-4 py-3 text-sm font-bold text-white hover:bg-red-700 active:scale-[0.99]"
                >
                    Publier
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
