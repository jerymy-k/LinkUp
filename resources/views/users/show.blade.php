<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User Profile
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6 space-y-6">

                <!-- Basic info -->
                <div>
                    <h3 class="text-2xl font-bold text-gray-800">
                        {{ $user->username }}
                    </h3>

                    <p class="text-sm text-gray-500">
                        {{ $user->email }}
                    </p>
                </div>

                <!-- Full name -->
                <div>
                    <p class="text-gray-700">
                        <span class="font-medium">Name:</span>
                        {{ $user->first_name }} {{ $user->last_name }}
                    </p>
                </div>

                <!-- Bio -->
                @if($user->bio)
                    <div>
                        <h4 class="font-semibold text-gray-800 mb-1">
                            Bio
                        </h4>
                        <p class="text-gray-700">
                            {{ $user->bio }}
                        </p>
                    </div>
                @endif

                <!-- Actions -->
                <div class="pt-4 border-t flex gap-3">
                    <a
                        href="{{ route('search.index') }}"
                        class="text-sm text-indigo-600 hover:underline"
                    >
                        ← Back to search
                    </a>

                    {{-- Future: Add Friend --}}
                    <button
                        disabled
                        class="ml-auto px-4 py-2 text-sm bg-gray-200 text-gray-500 rounded-md cursor-not-allowed"
                    >
                        Add Friend (soon)
                    </button>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
