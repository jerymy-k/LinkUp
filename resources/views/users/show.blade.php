<x-app-layout>
    <x-slot name="header">
        User Profile
    </x-slot>

    <div class="max-w-4xl mx-auto">
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
                        <a href="{{ $_GET['back']}}"
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
                                    <button
                                        class="px-4 py-2 rounded-lg bg-green-600 text-white text-sm font-bold hover:opacity-90">
                                        Accept
                                    </button>
                                </form>

                                <form method="POST" action="{{ route('friends.decline', $incomingRequest) }}">
                                    @csrf
                                    <button
                                        class="px-4 py-2 rounded-lg bg-gray-200 text-[#1b0e0e] text-sm font-bold hover:bg-gray-300">
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
    </div>
</x-app-layout>