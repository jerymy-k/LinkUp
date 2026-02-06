<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Demandes d'amis</h2>
    </x-slot>

    <div class="p-6 max-w-3xl mx-auto space-y-4">
        @if(session('success'))
            <div class="p-3 rounded bg-green-100 text-green-800">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="p-3 rounded bg-red-100 text-red-800">{{ session('error') }}</div>
        @endif

        @forelse($requests as $req)
            <a href="{{ route('users.show', $req->sender->id) }}"
                class="p-4 border rounded-xl flex items-center justify-between">
                <div class="flex gap-2">
                    <img src="{{ $req->sender->avatar }}" alt="" class="w-16 rounded-full">
                    <div>
                        <p class="font-semibold">{{ $req->sender->username ?? $req->sender->name }}</p>
                        <p class="text-sm text-gray-500">{{ $req->sender->email }}</p>
                    </div>
                </div>

                <div class="flex gap-2">
                    <form method="POST" action="{{ route('friends.accept', $req) }}">
                        @csrf
                        <button class="px-4 py-2 rounded-lg bg-green-600 text-white">Accepter</button>
                    </form>

                    <form method="POST" action="{{ route('friends.decline', $req) }}">
                        @csrf
                        <button class="px-4 py-2 rounded-lg bg-gray-200">Refuser</button>
                    </form>
                </div>
            </a>
        @empty
            <p class="text-gray-500">Aucune demande pour le moment.</p>
        @endforelse
        {{-- Suggestions --}}
        <div class="mt-8">
            <div class="flex items-end justify-between mb-3">
                <div>
                    <h3 class="text-lg font-bold text-[#1b0e0e]">Suggestions</h3>
                    <p class="text-sm text-[#994d51]">Des profils que tu peux ajouter.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @forelse($suggestions as $u)
                    <div class="p-4 border border-[#f3e7e8] bg-white rounded-2xl flex items-center justify-between">
                        <a href="{{ route('users.show', $u->id) }}" class="flex items-center gap-3 min-w-0">
                            <img src="{{ $u->avatar ?: 'https://i.pravatar.cc/80?img=12' }}"
                                class="w-12 h-12 rounded-full object-cover border border-[#f3e7e8]" alt="avatar">
                            <div class="min-w-0">
                                <p class="font-bold text-[#1b0e0e] truncate">{{ $u->username ?? $u->name }}</p>
                                <p class="text-xs text-[#994d51] truncate">{{ $u->email }}</p>
                            </div>
                        </a>

                        <form method="POST" action="{{ route('friends.send', $u) }}">
                            @csrf
                            <button class="px-4 py-2 rounded-xl bg-[#ea2a33] text-white text-sm font-bold hover:opacity-90">
                                Add
                            </button>
                        </form>
                    </div>
                @empty
                    <p class="text-sm text-[#994d51]">Pas de suggestions pour le moment.</p>
                @endforelse
            </div>
        </div>

    </div>
</x-app-layout>