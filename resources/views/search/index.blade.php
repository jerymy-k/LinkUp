<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Search Users
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Search form -->
            <div class="bg-white p-6 rounded-lg shadow">
                <form method="GET" action="{{ route('search.index') }}">
                    <label class="block text-sm font-medium text-gray-700">
                        Search by username or email
                    </label>

                    <div class="mt-2 flex gap-2">
                        <input type="text" name="q" value="{{ $q }}" placeholder="ex: john or john@email.com"
                            class="w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">

                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                            Search
                        </button>
                    </div>
                </form>
            </div>

            <!-- Results -->
            @if($q)
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-lg font-semibold mb-4">
                        Results
                    </h3>

                    @if($users->count() > 0)
                        <ul class="divide-y">
                            @foreach($users as $user)
                                <li class="py-3 flex items-center justify-between">
                                    <div>
                                        <p class="font-medium">
                                            {{ $user->username }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            {{ $user->email }}
                                        </p>
                                    </div>

                                    <a href="{{ route('users.show', $user) }}" class="text-indigo-600 hover:underline text-sm">
                                        View profile
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    @else
                        <p class="text-gray-500">
                            No users found.
                        </p>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-app-layout>