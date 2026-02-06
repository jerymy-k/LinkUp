{{-- resources/views/Home.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <h2 class="text-lg font-bold text-[#1b0e0e]">Home</h2>

            {{-- Optional search bar UI (only design) --}}
            <div class="hidden md:block w-full max-w-xl">
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-[#994d51]">🔎</span>
                    <input type="text" placeholder="Search by username or email" class="w-full h-10 pl-9 pr-4 rounded-lg border border-[#f3e7e8] bg-[#f8f6f6]
                               text-sm focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33]">
                </div>
            </div>
        </div>
    </x-slot>

    <div class="min-h-[calc(100vh-64px)] bg-[#f8f6f6]">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 py-8 space-y-6">

            {{-- Flash --}}
            @if(session('success'))
                <div class="rounded-xl border border-[#e7d0d1] bg-white p-4 text-sm text-[#1b0e0e]">
                    ✅ {{ session('success') }}
                </div>
            @endif

            {{-- CREATE POST --}}
            <section class="rounded-2xl border border-[#e7d0d1] bg-white shadow-sm overflow-hidden">
                <div class="p-5 border-b border-[#f3e7e8]">
                    <p class="font-bold text-[#1b0e0e]">Créer une publication</p>
                    <p class="text-sm text-[#994d51]">Partage du texte ou une image avec tes amis.</p>
                </div>

                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"
                    class="p-5 space-y-4">
                    @csrf

                    <div>
                        <textarea name="content" rows="3" placeholder="Quoi de neuf ?" class="w-full rounded-xl border border-[#e7d0d1] bg-[#f8f6f6] p-4 text-sm
                                   focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33]"
                            required>{{ old('content') }}</textarea>
                        @error('content')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between gap-3 flex-wrap">
                        <label
                            class="inline-flex items-center gap-2 text-sm font-semibold text-[#ea2a33] cursor-pointer">
                            <input type="file" name="image" class="hidden">
                            📷 Ajouter une image
                        </label>

                        @error('image')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <button type="submit"
                            class="h-11 px-5 rounded-xl bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90 active:scale-[0.98]">
                            Publier
                        </button>
                    </div>
                </form>
            </section>

            {{-- FEED --}}
            <div class="space-y-4">
                @forelse($posts as $post)
                    <article class="rounded-2xl border border-[#e7d0d1] bg-white shadow-sm overflow-hidden">
                        {{-- Header --}}
                        <div class="p-5 flex items-start justify-between gap-3">
                            <a href="{{ route('users.show', $post->user) }}?back=/home">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="h-11 w-11 rounded-xl overflow-hidden bg-[#f3e7e8] border border-[#f3e7e8]">
                                        <img class="h-11 w-11 object-cover"
                                            src="{{ $post->user->avatar ?? 'https://i.pravatar.cc/80?img=12' }}"
                                            alt="avatar">
                                    </div>

                                    <div class="min-w-0">
                                        <p class="font-bold text-[#1b0e0e] truncate">
                                            {{ $post->user->username ?? $post->user->name }}
                                        </p>
                                        <p class="text-xs text-[#994d51]">
                                            {{ $post->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </a>

                            {{-- Owner actions --}}
                            @if($post->user_id === auth()->id())
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('posts.edit', $post) }}"
                                        class="px-3 py-1.5 rounded-lg border border-[#f3e7e8] text-sm font-semibold text-[#1b0e0e] hover:bg-[#f8f6f6]">
                                        Edit
                                    </a>

                                    <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                        onsubmit="return confirm('Supprimer ce post ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-3 py-1.5 rounded-lg bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>

                        {{-- Content --}}
                        <div class="px-5 pb-4">
                            <p class="text-sm text-[#1b0e0e]/90 whitespace-pre-line">
                                {{ $post->content }}
                            </p>
                        </div>

                        {{-- Image --}}
                        @if($post->image_path)
                            <div class="border-t border-[#f3e7e8] bg-[#f8f6f6]">
                                <img src="{{ asset('storage/' . $post->image_path) }}" class="w-full max-h-[520px] object-cover"
                                    alt="post image">
                            </div>
                        @endif

                        {{-- Actions --}}
                        <div class="px-5 py-3 border-t border-[#f3e7e8] flex items-center justify-between">
                            {{-- Like --}}
                            <form method="POST" action="{{ route('posts.like', $post) }}">
                                @csrf
                                <button class="font-bold text-[#994d51] hover:text-[#ea2a33]">
                                    ❤️ Like ({{ $post->likes()->count() }})
                                </button>
                            </form>

                            {{-- Comments (FB style toggle) --}}
                            <div x-data="{ open:false }" class="text-right">
                                <button type="button" @click="open = !open"
                                    class="font-bold text-[#994d51] hover:text-[#ea2a33]">
                                    💬 Comment ({{ $post->comments->count() }})
                                </button>

                                {{-- Panel --}}
                                <div x-show="open" x-transition class="mt-3 text-left">
                                    {{-- List --}}
                                    <div class="space-y-3">
                                        @forelse($post->comments as $comment)
                                            <div class="rounded-xl border border-[#f3e7e8] bg-[#f8f6f6] p-3">

                                                <div class="flex items-start justify-between gap-3">
                                                    <div>
                                                        <p class="text-sm font-bold text-[#1b0e0e]">
                                                            {{ $comment->user->username ?? $comment->user->name }}
                                                        </p>
                                                        <p class="text-[11px] text-[#994d51]">
                                                            {{ $comment->created_at->diffForHumans() }}
                                                        </p>
                                                    </div>

                                                    {{-- Edit/Delete كيبانو غير لمالك الكومنت --}}
                                                    @if(auth()->id() === $comment->user_id)
                                                        <div class="flex items-center gap-2">
                                                            {{-- Edit (inline) --}}
                                                            <button type="button"
                                                                class="text-xs font-bold text-[#ea2a33] hover:underline"
                                                                onclick="document.getElementById('edit-box-{{ $comment->id }}').classList.toggle('hidden')">
                                                                Edit
                                                            </button>

                                                            {{-- Delete --}}
                                                            <form method="POST" action="{{ route('comments.destroy', $comment) }}"
                                                                onsubmit="return confirm('Supprimer ce commentaire ?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="text-xs font-bold text-red-600 hover:underline">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>

                                                {{-- content --}}
                                                <p class="text-sm text-[#1b0e0e]/80 mt-1">
                                                    {{ $comment->content }}
                                                </p>

                                                {{-- EDIT BOX (hidden) --}}
                                                @if(auth()->id() === $comment->user_id)
                                                    <div id="edit-box-{{ $comment->id }}" class="hidden mt-3">
                                                        <form method="POST" action="{{ route('comments.update', $comment) }}"
                                                            class="flex gap-2">
                                                            @csrf
                                                            @method('PUT')

                                                            <input name="content" type="text" value="{{ $comment->content }}"
                                                                class="w-full h-10 rounded-xl border border-[#e7d0d1] bg-white px-3 text-sm
                                                                                                                       focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33]" required>

                                                            <button
                                                                class="h-10 px-4 rounded-xl bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
                                                                Save
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        @empty
                                            <p class="text-sm text-[#994d51]">Aucun commentaire pour le moment.</p>
                                        @endforelse
                                    </div>

                                    {{-- Add comment form --}}
                                    <form method="POST" action="{{ route('comments.store', $post) }}"
                                        class="mt-4 flex gap-2">
                                        @csrf
                                        <input name="content" type="text" placeholder="Écrire un commentaire..."
                                            class="w-full h-11 rounded-xl border border-[#e7d0d1] bg-white px-4 text-sm
                                                                   focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33]" required>
                                        <button
                                            class="h-11 px-4 rounded-xl bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
                                            Envoyer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="rounded-2xl border border-[#e7d0d1] bg-white p-6 text-center text-sm text-[#994d51]">
                        Aucun post pour le moment. Sois le premier à publier 👀
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>