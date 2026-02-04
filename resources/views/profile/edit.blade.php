<x-app-layout>
    <x-slot name="header" >
        Profile
    </x-slot>

    <div class="space-y-10 max-w-4xl mx-auto">

        {{-- PROFILE INFO --}}
        <div class="bg-white border border-[#f3e7e8] rounded-xl shadow-sm">
            @include('profile.partials.update-profile-information-form')
        </div>

        {{-- UPDATE PASSWORD --}}
        <div class="bg-white border border-[#f3e7e8] rounded-xl shadow-sm">
            @include('profile.partials.update-password-form')
        </div>

        {{-- DELETE ACCOUNT --}}
        <div class="bg-white border border-[#f3e7e8] rounded-xl shadow-sm">
            @include('profile.partials.delete-user-form')
        </div>

        <div>
            @include('profile.partials.friends-list')
        </div>
        
    </div>
    
</x-app-layout>