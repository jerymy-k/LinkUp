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
            <a href="{{ route('users.show' , $req->sender->id) }}"
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
    </div>
</x-app-layout>