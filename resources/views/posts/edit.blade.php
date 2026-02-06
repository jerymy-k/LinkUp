<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between w-full">
            <h2 class="font-bold text-lg text-[#1b0e0e]">Modifier le post</h2>
            <a href="{{ route('home
            
            ') }}" class="text-sm font-bold text-[#ea2a33] hover:underline">Retour</a>
        </div>
    </x-slot>

    <div class="max-w-2xl mx-auto space-y-4">
        <div class="rounded-2xl border border-[#e7d0d1] bg-white p-6 shadow-sm">
            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PATCH')

                <div>
                    <p class="text-sm font-medium text-[#1b0e0e] pb-2 ml-1">Contenu</p>
                    <textarea name="content" rows="4"
                        class="w-full rounded-lg border border-[#e7d0d1] bg-[#f8f6f6] px-4 py-3 text-sm focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33]"
                    >{{ old('content', $post->content) }}</textarea>
                    @error('content') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                @if($post->image_path)
                    <div class="rounded-xl overflow-h
                    <<#1b0e0e
                    2idden border border-[#f3e7e8]">
                        <img src="{{ asset('storage/'.$post->image_path) }}" class="w-full max-h-[420px] object-cover" alt="">
                    </div>

                    <label class="inline-flex items-center gap-2 text-sm text-[#4a3a3a]">
                        <input type="checkbox" name="remove_image" value="1"
                               class="rounded border-[#e7d0d1] text-[#ea2a33] focus:ring-[#ea2a33]">
                        Supprimer l’image
                    </label>
                @endif

                <div>
                    <p class="text-sm font-medium text-[#1b0e0e] pb-2 ml-1">Changer l’image (optionnel)</p>
                    <input type="file" name="image"
                        class="block w-full text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-[#ea2a33] file:px-4 file:py-2 file:text-white hover:file:bg-[#ea2a33]/90">
                    @error('image') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <button type="submit"
                    class="w-full bg-[#ea2a33] text-white rounded-lg h-14 text-base font-bold tracking-wide shadow-lg shadow-[#ea2a33]/20 hover:bg-[#ea2a33]/90 transition-all active:scale-[0.98]">
                    Enregistrer
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
