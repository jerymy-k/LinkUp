<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LINKUP') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="hidden fixed top-0 left-0 md:flex md:w-64 h-screen flex-col bg-white border-r">
            <div class="h-16 px-6 flex items-center border-b">
                <div class="h-9 w-9 rounded-xl bg-indigo-600 grid place-items-center text-white font-black">LK</div>
                <div class="ml-3 leading-4">
                    <p class="text-sm font-semibold">LINKUP</p>
                    <p class="text-xs text-gray-500">Navigation</p>
                </div>
            </div>

            <nav class="p-4 space-y-1 text-sm">
                <a href="{{ route('dashboard') }}"
                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700' }}">
                    Dashboard
                </a>

                <a href="{{ route('search.index') }}"
                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('search.*') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700' }}">
                    Search
                </a>

                <a href="{{ route('profile.edit') }}"
                    class="block px-3 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('profile.*') ? 'bg-indigo-50 text-indigo-700 font-semibold' : 'text-gray-700' }}">
                    Profile
                </a>

                <!-- placeholders for next days -->
                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-400 cursor-not-allowed">
                    Friends (soon)
                </a>

                <a href="#" class="block px-3 py-2 rounded-lg hover:bg-gray-100 text-gray-400 cursor-not-allowed">
                    Notifications (soon)
                </a>
            </nav>

            <div class="mt-auto p-4 border-t">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-xl bg-gray-200 overflow-hidden">
                        <img class="h-10 w-10 object-cover" src="https://i.pravatar.cc/80?img=12" alt="avatar">
                    </div>
                    <div class="min-w-0">
                        <p class="text-sm font-semibold truncate">{{ auth()->user()->username ?? auth()->user()->name }}
                        </p>
                        <p class="text-xs text-gray-500 truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button class="w-full px-3 py-2 rounded-lg bg-gray-900 text-white text-sm hover:bg-black">
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main -->
        <div class="flex-1 md:ml-64">
            <!-- Topbar -->
            <header class="sticky top-0 z-40 h-16 bg-white border-b flex items-center justify-between px-4 sm:px-6">
                <div class="md:hidden flex items-center gap-2">
                    <div class="h-9 w-9 rounded-xl bg-indigo-600 grid place-items-center text-white font-black">LK</div>
                    <span class="text-sm font-semibold">LINKUP</span>
                </div>

                <div class="hidden md:block text-sm text-gray-600">
                    {{ $header ?? '' }}
                </div>

                <a href="{{ route('profile.edit') }}"
                    class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">
                    My Profile
                </a>
            </header>

            <!-- Page Content -->
            <main class="p-4 sm:p-6">
                {{ $slot }}
            </main>
        </div>

    </div>
</body>

</html>