<x-guest-layout>
    <div class="min-h-screen bg-[#f8f6f6] flex flex-col font-['Public_Sans']">
        {{-- Top bar --}}
        <header class="w-full bg-white/80 backdrop-blur-md border-b border-[#f3e7e8] sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-10 h-16 flex items-center justify-between">
                <div class="flex items-center gap-2 text-[#1b0e0e]">
                    <div class="size-6 text-[#ea2a33]">
                        <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 4H17.3334V17.3334H30.6666V30.6666H44V44H4V4Z"></path>
                        </svg>
                    </div>
                    <h2 class="text-xl font-bold leading-tight tracking-tight">LinkUp</h2>
                </div>

                <div class="flex items-center gap-8">
                    <nav class="hidden md:flex items-center gap-6">
                        <a class="text-sm font-medium text-[#1b0e0e] hover:text-[#ea2a33] transition-colors" href="#">Features</a>
                        <a class="text-sm font-medium text-[#1b0e0e] hover:text-[#ea2a33] transition-colors" href="#">About</a>
                        <a class="text-sm font-medium text-[#1b0e0e] hover:text-[#ea2a33] transition-colors" href="#">Safety</a>
                    </nav>
                    <a href="{{ route('login') }}" class="bg-[#ea2a33] text-white text-sm font-bold px-5 py-2 rounded-lg hover:bg-[#ea2a33]/90 transition-all shadow-sm">
                        Log in
                    </a>
                </div>
            </div>
        </header>

        {{-- Main --}}
        <main class="flex-1 flex items-center justify-center p-6 sm:p-12">
            <div class="w-full max-w-[540px] bg-white p-8 md:p-12 rounded-xl shadow-2xl shadow-[#ea2a33]/5 border border-[#e7d0d1]">

                {{-- Headline --}}
                <div class="mb-10 text-center">
                    <h1 class="text-[#1b0e0e] text-3xl font-bold tracking-tight mb-2">
                        Create your account
                    </h1>
                    <p class="text-[#4a3a3a] text-base">
                        Join LinkUp and start connecting.
                    </p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <label class="flex flex-col">
                        <p class="text-[#1b0e0e] text-sm font-medium pb-2 ml-1">Name</p>
                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="John Doe"
                            class="w-full rounded-lg border border-[#e7d0d1] bg-[#f8f6f6] text-[#1b0e0e] focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33] h-12 px-4 text-base transition-all placeholder:text-gray-400"
                        />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </label>

                    {{-- Username --}}
                    <label class="flex flex-col">
                        <div class="flex justify-between items-center pb-2 px-1">
                            <p class="text-[#1b0e0e] text-sm font-medium">Username</p>
                            <span class="text-[10px] text-[#ea2a33]/70 font-bold uppercase tracking-widest">Required</span>
                        </div>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-[#ea2a33] font-medium">@</span>
                            <input
                                id="username"
                                name="username"
                                type="text"
                                value="{{ old('username') }}"
                                required
                                autocomplete="username"
                                placeholder="username"
                                class="w-full rounded-lg border border-[#e7d0d1] bg-[#f8f6f6] text-[#1b0e0e] focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33] h-12 pl-8 pr-4 text-base transition-all placeholder:text-gray-400"
                            />
                        </div>
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </label>

                    {{-- Email --}}
                    <label class="flex flex-col">
                        <p class="text-[#1b0e0e] text-sm font-medium pb-2 ml-1">Email Address</p>
                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                            placeholder="name@company.com"
                            class="w-full rounded-lg border border-[#e7d0d1] bg-[#f8f6f6] text-[#1b0e0e] focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33] h-12 px-4 text-base transition-all placeholder:text-gray-400"
                        />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </label>

                    {{-- Password --}}
                    <label class="flex flex-col">
                        <p class="text-[#1b0e0e] text-sm font-medium pb-2 ml-1">Password</p>
                        <input
                            id="password"
                            name="password"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full rounded-lg border border-[#e7d0d1] bg-[#f8f6f6] text-[#1b0e0e] focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33] h-12 px-4 text-base transition-all placeholder:text-gray-400"
                        />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </label>

                    {{-- Confirm Password --}}
                    <label class="flex flex-col">
                        <p class="text-[#1b0e0e] text-sm font-medium pb-2 ml-1">Confirm Password</p>
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            required
                            autocomplete="new-password"
                            placeholder="••••••••"
                            class="w-full rounded-lg border border-[#e7d0d1] bg-[#f8f6f6] text-[#1b0e0e] focus:border-[#ea2a33] focus:ring-1 focus:ring-[#ea2a33] h-12 px-4 text-base transition-all placeholder:text-gray-400"
                        />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </label>

                    {{-- Button --}}
                    <button
                        type="submit"
                        class="w-full bg-[#ea2a33] text-white rounded-lg h-14 text-base font-bold tracking-wide shadow-lg shadow-[#ea2a33]/20 hover:bg-[#ea2a33]/90 transition-all mt-4 active:scale-[0.98]"
                    >
                        Create Account
                    </button>
                </form>

                {{-- Footer link --}}
                <div class="mt-8 text-center border-t border-[#f3e7e8] pt-6">
                    <p class="text-[#4a3a3a] text-sm">
                        Already have an account?
                        <a class="text-[#ea2a33] font-bold hover:underline underline-offset-4 ml-1" href="{{ route('login') }}">
                            Log in
                        </a>
                    </p>
                </div>
            </div>
        </main>

        <footer class="py-8 px-10 text-center">
            <p class="text-[#994d51] text-xs font-medium tracking-wide">© {{ date('Y') }} LINKUP. ALL RIGHTS RESERVED.</p>
        </footer>
    </div>
</x-guest-layout>
