@php
    $pendingFriendRequests = \App\Models\FriendRequest::query()
        ->where('receiver_id', auth()->id())
        ->where('status', 'pending')
        ->count();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('linkupicon.png') }}?v=1">
    <link rel="apple-touch-icon" href="{{ asset('linkupicon.png') }}?v=1">


    <title>{{ config('app.name', 'LINKUP') }}</title>

    {{-- Font + Icons (comme ton template) --}}
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    {{-- Mini design tokens sans tailwind.config --}}
    <style>
        :root {
            --primary: #ea2a33;
            --bg-light: #f8f6f6;
            --text-main: #1b0e0e;
            --text-muted: #994d51;
            --border: #f3e7e8;
            --dark: #211111;
        }

        body {
            font-family: "Public Sans", system-ui, sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-[var(--bg-light)] text-[var(--text-main)]">
    <div class="flex min-h-screen overflow-hidden">

        {{-- Sidebar --}}
        <aside
            class="fixed h-screen hidden md:flex w-64 shrink-0 border-r border-[var(--border)] bg-[var(--bg-light)] flex-col justify-between p-4">
            <div class="flex flex-col gap-8">
                {{-- Logo --}}
                <div class="flex items-center gap-3 px-2">
                    <div class="size-10 rounded-lg flex items-center justify-center text-white"
                        style="background: var(--primary);">
                        <span class="material-symbols-outlined">link</span>
                    </div>
                    <div class="flex flex-col leading-none">
                        <p class="text-lg font-bold">LinkUp</p>
                        <p class="text-xs text-[var(--text-muted)]">Social Network</p>
                    </div>
                </div>

                {{-- Nav --}}
                <nav class="flex flex-col gap-1 text-sm ">
                    <a href="{{ route('home') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                   {{ request()->routeIs('home') ? 'bg-[color:rgba(234,42,51,0.10)] text-[var(--primary)]' : 'hover:bg-[var(--border)]' }}">
                        <span class="material-symbols-outlined text-base">house</span>
                        <span class="font-medium">Home</span>
                    </a>

                    <a href="{{ route('search.index') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                   {{ request()->routeIs('search.*') ? 'bg-[color:rgba(234,42,51,0.10)] text-[var(--primary)]' : 'hover:bg-[var(--border)]' }}">
                        <span class="material-symbols-outlined text-base">search</span>
                        <span class="font-medium">Search</span>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center gap-3 px-3 py-2 rounded-lg transition
                   {{ request()->routeIs('profile.*') ? 'bg-[color:rgba(234,42,51,0.10)] text-[var(--primary)]' : 'hover:bg-[var(--border)]' }}">
                        <span class="material-symbols-outlined text-base">person</span>
                        <span class="font-medium">Profile</span>
                    </a>
                    <a href="{{ route('friends.requests') }}"
                        class="flex items-center justify-between px-3 py-2 rounded-lg transition
   {{ request()->routeIs('friends.*') ? 'bg-[color:rgba(234,42,51,0.10)] text-[var(--primary)]' : 'hover:bg-[var(--border)]' }}">

                        <span class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-base">group</span>
                            <span class="font-medium">Friends</span>
                        </span>

                        {{-- 🔴 Badge --}}
                        @if($pendingFriendRequests > 0)
                            <span
                                class="min-w-6 h-6 px-2 rounded-full bg-[#ea2a33] text-white text-xs font-bold flex items-center justify-center">
                                {{ $pendingFriendRequests }}
                            </span>
                        @endif
                    </a>


                    {{-- Soon --}}
                    <div class="mt-3 pt-3 border-t border-[var(--border)]">
                        <a href="#"
                            class="flex items-center gap-3 px-3 py-2 rounded-lg text-[var(--text-muted)] opacity-60 cursor-not-allowed">
                            <span class="material-symbols-outlined text-base">notifications</span>
                            <span class="font-medium">Notifications (soon)</span>
                        </a>
                    </div>
                </nav>
            </div>

            {{-- User / Logout --}}
            <div class="border-t border-[var(--border)] pt-4">
                <div class="flex items-center gap-3 px-2">
                    <div class="size-10 rounded-full overflow-hidden border border-[var(--border)] bg-white">
                        <img class="h-full w-full object-cover"
                            src="{{ auth()->user()->avatar ?? 'https://i.pravatar.cc/80?img=12' }}" alt="avatar">
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold truncate">
                            {{ auth()->user()->username ?? auth()->user()->name }}
                        </p>
                        <p class="text-xs text-[var(--text-muted)] truncate">
                            {{ auth()->user()->email }}
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-4 px-2">
                    @csrf
                    <button
                        class="w-full h-11 rounded-lg text-white text-sm font-bold tracking-wide transition hover:opacity-90"
                        style="background: var(--primary);">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main --}}
        <div class="flex-1 min-w-0 flex flex-col overflow-y-auto">

            {{-- Topbar --}}
            <header
                class="sticky top-0 z-40 border-b border-[var(--border)] bg-[color:rgba(248,246,246,0.80)] backdrop-blur px-4 sm:px-8 py-3">
                <div class="flex items-center justify-between gap-4">

                    {{-- Left: Title + search --}}
                    <div class="flex items-center gap-4 flex-1 min-w-0">
                        <div class="flex items-center gap-2 md:hidden">
                            <div class="size-10 rounded-lg flex items-center justify-center text-white"
                                style="background: var(--primary);">
                                <span class="material-symbols-outlined">link</span>
                            </div>
                            <span class="font-bold">LinkUp</span>
                        </div>

                        <div class="hidden md:block min-w-0">
                            {{-- header slot (title page) --}}
                            <div class="truncate">
                                {{ $header ?? '' }}
                            </div>
                        </div>

                        {{-- Search bar (UI only) --}}

                    </div>

                    {{-- Right --}}
                    <div class="flex items-center gap-3">
                        <a href="{{ route('profile.edit') }}"
                            class="text-sm font-bold text-[var(--primary)] hover:opacity-90">
                            My Profile
                        </a>
                    </div>

                </div>
            </header>

            {{-- Page Content --}}
            <main class="px-4 sm:px-8 py-6 w-full">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>

</html>