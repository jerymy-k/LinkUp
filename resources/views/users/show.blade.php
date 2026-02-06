<x-app-layout>
    <x-slot name="header">
        User Profile
    </x-slot>

    <div class="max-w-4xl mx-auto space-y-6">

        {{-- بطاقة البروفايل --}}
        <div class="bg-white border border-[#f3e7e8] rounded-xl shadow-sm overflow-hidden">

            {{-- Banner --}}
            <div class="relative h-44 bg-[#f3e7e8]">
                @if($user->banner)
                    <img src="{{ $user->banner }}" alt="banner" class="h-44 w-full object-cover">
                    <div class="absolute inset-0 bg-black/25"></div>
                @else
                    <div class="h-44 w-full bg-gradient-to-r from-[#f3e7e8] to-white"></div>
                @endif

                {{-- Avatar --}}
                <div class="absolute -bottom-10 left-6">
                    <div class="h-24 w-24 rounded-full border-4 border-white bg-white overflow-hidden shadow">
                        <img src="{{ $user->avatar ?: 'https://i.pravatar.cc/150?img=12' }}" alt="avatar"
                            class="h-full w-full object-cover">
                    </div>
                </div>
            </div>

            {{-- Infos --}}
            <div class="pt-14 px-6 pb-6">
                <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4">
                    <div class="min-w-0">
                        <h1 class="text-2xl font-bold text-[#1b0e0e] truncate">
                            {{ $user->username ?? $user->name }}
                        </h1>
                        <p class="text-sm text-[#994d51] truncate">{{ $user->email }}</p>

                        @php
                            $fullName = trim(($user->first_name ?? '') . ' ' . ($user->last_name ?? ''));
                        @endphp

                        @if($fullName)
                            <p class="mt-3 text-sm text-[#1b0e0e]">
                                <span class="font-semibold">Nom :</span> {{ $fullName }}
                            </p>
                        @endif

                        @if($user->bio)
                            <div class="mt-4">
                                <p class="text-sm font-semibold text-[#1b0e0e]">Bio</p>
                                <p class="mt-1 text-sm text-[#1b0e0e]/80 whitespace-pre-line">
                                    {{ $user->bio }}
                                </p>
                            </div>
                        @else
                            <p class="mt-4 text-sm text-[#994d51]">Aucune bio pour le moment.</p>
                        @endif
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-2">
                        <a href="{{ request('back', url()->previous()) }}"
                            class="px-4 py-2 rounded-lg border border-[#f3e7e8] text-sm font-semibold text-[#1b0e0e] hover:bg-[#f3e7e8]/50">
                            ← Back
                        </a>

                        @if($friendState === 'friends')
                            <span class="px-4 py-2 rounded-lg bg-green-100 text-sm font-bold text-green-700">
                                Friends
                            </span>

                        @elseif($friendState === 'incoming_pending')
                            <div class="flex gap-2">
                                <form method="POST" action="{{ route('friends.accept', $incomingRequest) }}">
                                    @csrf
                                    <button class="px-4 py-2 rounded-lg bg-green-600 text-white text-sm font-bold hover:opacity-90">
                                        Accept
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('friends.decline', $incomingRequest) }}">
                                    @csrf
                                    <button class="px-4 py-2 rounded-lg bg-gray-200 text-[#1b0e0e] text-sm font-bold hover:bg-gray-300">
                                        Refuse
                                    </button>
                                </form>
                            </div>

                        @elseif($friendState === 'outgoing_pending')
                            <button type="button"
                                class="px-4 py-2 rounded-lg bg-[#f3e7e8] text-[#1b0e0e] text-sm font-bold cursor-not-allowed"
                                disabled>
                                Request sent
                            </button>

                        @else
                            <form method="POST" action="{{ route('friends.send', $user) }}">
                                @csrf
                                <button type="submit"
                                    class="px-4 py-2 rounded-lg bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
                                    Add Friend
                                </button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>

            {{-- Footer line --}}
            <div class="border-t border-[#f3e7e8] px-6 py-4 text-xs text-[#994d51]">
                LINKUP • Profil public
            </div>
        </div>

        {{-- ✅ POSTS SECTION --}}
        <section class="space-y-4">
            <div class="flex items-end justify-between">
                <div>
                    <h2 class="text-lg font-bold text-[#1b0e0e]">Publications</h2>
                    <p class="text-sm text-[#994d51]">Les posts de {{ $user->username ?? $user->name }}</p>
                </div>
            </div>

            @forelse($posts as $post)
                <article class="rounded-2xl border border-[#e7d0d1] bg-white shadow-sm overflow-hidden">
                    {{-- Header --}}
                    <div class="p-5 flex items-start justify-between gap-3">
                        <div class="flex items-center gap-3 min-w-0">
                            <div class="h-11 w-11 rounded-xl overflow-hidden bg-[#f3e7e8] border border-[#f3e7e8]">
                                <img
                                    class="h-11 w-11 object-cover"
                                    src="{{ $post->user->avatar ?? 'https://i.pravatar.cc/80?img=12' }}"
                                    alt="avatar"
                                >
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

                        {{-- owner actions (only if it's me) --}}
                        @if($post->user_id === auth()->id())
                            <div class="flex items-center gap-2">
                                <a
                                    href="{{ route('posts.edit', $post) }}"
                                    class="px-3 py-1.5 rounded-lg border border-[#f3e7e8] text-sm font-semibold text-[#1b0e0e] hover:bg-[#f8f6f6]"
                                >
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('posts.destroy', $post) }}"
                                      onsubmit="return confirm('Supprimer ce post ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1.5 rounded-lg bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
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
                            <img
                                src="{{ asset('storage/' . $post->image_path) }}"
                                class="w-full max-h-[520px] object-cover"
                                alt="post image"
                            >
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

                        {{-- Comments toggle --}}
                        <div x-data="{ open:false }" class="text-right">
                            <button
                                type="button"
                                @click="open = !open"
                                class="font-bold text-[#994d51] hover:text-[#ea2a33]"
                            >
                                💬 Comment ({{ $post->comments->count() }})
                            </button>

                            <div x-show="open" x-transition class="mt-3 text-left">
                                {{-- list --}}
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

                                                @if(auth()->id() === $comment->user_id)
                                                    <div class="flex items-center gap-2">
                                                        <button
                                                            type="button"
                                                            class="text-xs font-bold text-[#ea2a33] hover:underline"
                                                            onclick="document.getElementById('edit-box-{{ $comment->id }}').classList.toggle('hidden')"
                                                        >
                                                            Edit
                                                        </button>

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

                                            <p class="text-sm text-[#1b0e0e]/80 mt-1">
                                                {{ $comment->content }}
                                            </p>

                                            @if(auth()->id() === $comment->user_id)
                                                <div id="edit-box-{{ $comment->id }}" class="hidden mt-3">
                                                    <form method="POST" action="{{ route('comments.update', $comment) }}" class="flex gap-2">
                                                        @csrf
                                                        @method('PUT')
                                                        <input
                                                            name="content"
                                                            type="text"
                                                            value="{{ $comment->content }}"
                                                            class="w-full h-10 rounded-xl border border-[#e7d0d1] bg-white px-3 text-sm
                                                                   focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33]"
                                                            required
                                                        >
                                                        <button class="h-10 px-4 rounded-xl bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
                                                            Save
                                                        </button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    @empty
                                        <p class="text-sm text-[#994d51]">Aucun commentaire.</p>
                                    @endforelse
                                </div>

                                {{-- add comment --}}
                                <form method="POST" action="{{ route('comments.store', $post) }}" class="mt-4 flex gap-2">
                                    @csrf
                                    <input
                                        name="content"
                                        type="text"
                                        placeholder="Écrire un commentaire..."
                                        class="w-full h-11 rounded-xl border border-[#e7d0d1] bg-white px-4 text-sm
                                               focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33]"
                                        required
                                    >
                                    <button class="h-11 px-4 rounded-xl bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
                                        Envoyer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </article>
            @empty
                <div class="rounded-2xl border border-[#e7d0d1] bg-white p-6 text-center text-sm text-[#994d51]">
                    Aucun post pour le moment.
                </div>
            @endforelse
        </section>

    </div>
</x-app-layout>
