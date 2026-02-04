<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4">
            <div class="min-w-0">
                <h2 class="text-lg font-bold truncate">Member Search</h2>
                <p class="text-xs text-[var(--text-muted)]">Trouve un utilisateur par username ou email.</p>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto w-full">
        {{-- Page heading --}}
        <div class="flex flex-wrap items-end justify-between gap-4 mb-6">
            <div>
                <h1 class="text-3xl font-bold tracking-tight text-[var(--text-main)]">Discover Members</h1>
                <p class="text-sm text-[var(--text-muted)] mt-1">
                    Recherche rapide avec suggestions (username/email).
                </p>
            </div>
        </div>

        {{-- Search Card --}}
        <div class="bg-white rounded-xl border border-[var(--border)] p-5 mb-6">
            <form method="GET" action="{{ route('search.index') }}" class="space-y-3">
                <label class="text-sm font-semibold text-[var(--text-main)]">
                    Search by username or email
                </label>

                <div class="flex flex-col sm:flex-row gap-3">
                    <div class="relative flex-1">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[var(--text-muted)]">
                            search
                        </span>

                        <input type="text" name="q" value="{{ $q }}" placeholder="ex: mohamed or mohamed@email.com"
                            class="w-full h-11 pl-10 pr-4 rounded-lg border border-[var(--border)] bg-[var(--bg-light)] placeholder:text-[var(--text-muted)]
                                   focus:ring-2 focus:ring-[color:rgba(234,42,51,0.35)] focus:border-transparent text-sm"
                            autocomplete="off">
                    </div>

                    <button type="submit"
                        class="h-11 px-5 rounded-lg text-white text-sm font-bold tracking-wide hover:opacity-90 transition"
                        style="background: var(--primary);">
                        Search
                    </button>
                </div>

                <p class="text-xs text-[var(--text-muted)]">
                    Astuce : tape juste quelques lettres pour trouver des gens qui contiennent ces lettres.
                </p>
            </form>
        </div>

        {{-- Results --}}
        @if($q)
            <div class="flex items-center justify-between gap-3 mb-4">
                <div>
                    <h3 class="text-lg font-bold text-[var(--text-main)]">Results</h3>
                    <p class="text-xs text-[var(--text-muted)]">
                        Résultats pour : <span class="font-semibold text-[var(--text-main)]">{{ $q }}</span>
                    </p>
                </div>

                <a href="{{ route('search.index') }}" class="text-sm font-bold text-[var(--primary)] hover:opacity-90">
                    Reset
                </a>
            </div>

            @if($users->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach($users as $user)
                        <div class="bg-white rounded-xl border border-[var(--border)] p-5 hover:shadow-lg transition-shadow">
                            <div class="flex flex-col items-center text-center">
                                {{-- Avatar --}}
                                <div class="relative mb-4">
                                    <div class="size-20 rounded-full bg-cover bg-center border-2 border-[color:rgba(234,42,51,0.10)]"
                                        style="background-image: url('{{ $user->avatar ?? 'https://i.pravatar.cc/150?u=' . $user->id }}')">
                                    </div>
                                </div>

                                {{-- Name --}}
                                <h3 class="font-bold text-[var(--text-main)]">
                                    {{ $user->username ?? $user->name }}
                                </h3>

                                <p class="text-xs text-[var(--text-muted)] mb-3 truncate w-full">
                                    {{ '@' . ($user->username ?? 'user') }} • {{ $user->email }}
                                </p>

                                {{-- Bio --}}
                                <p class="text-sm text-[var(--text-main)]/80 mb-5 line-clamp-2">
                                    {{ $user->bio ?: 'Aucune bio pour le moment.' }}
                                </p>

                                {{-- Actions --}}
                                <div class="flex gap-2 w-full">
                                    <a href="{{ route('users.show', $user) }}?back=/search"
                                        class="flex-1 py-2 text-white rounded-lg text-sm font-bold hover:opacity-90 transition"
                                        style="background: var(--primary);">
                                        View profile
                                    </a>

                                    <form method="POST" action="{{ route('friends.send', $user) }}">
                                        @csrf
                                        <button class="px-4 py-2 bg-black text-white rounded-lg">
                                            Ajouter
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-6">
                    {{ $users->links() }}
                </div>
            @else
                <div class="bg-white rounded-xl border border-[var(--border)] p-6">
                    <p class="text-sm text-[var(--text-muted)]">
                        Aucun utilisateur trouvé.
                    </p>
                </div>
            @endif
        @else
            {{-- Empty state --}}
            <div class="bg-white rounded-xl border border-[var(--border)] p-10 text-center">
                <div
                    class="mx-auto size-12 rounded-full bg-[var(--border)] flex items-center justify-center text-[var(--text-muted)] mb-3">
                    <span class="material-symbols-outlined">search</span>
                </div>
                <h3 class="text-lg font-bold text-[var(--text-main)]">Start searching</h3>
                <p class="text-sm text-[var(--text-muted)] mt-1">
                    Tape un username ou un email pour voir les membres.
                </p>
            </div>
        @endif
    </div>
</x-app-layout>