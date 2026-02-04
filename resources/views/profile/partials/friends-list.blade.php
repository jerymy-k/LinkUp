<section>
            <div class="px-6 pb-6">
                <div class="mt-6">
                    <div class="flex items-center justify-between">
                        <h3 class="text-sm font-extrabold text-[#1b0e0e] tracking-wide">
                            Friends
                            <span class="text-[#994d51] font-semibold">
                                ({{ $friends->count() }})
                            </span>
                        </h3>


                    </div>

                    @if($friends->isEmpty())
                        <p class="mt-3 text-sm text-[#994d51]">
                            No friends to show yet.
                        </p>
                    @else
                        <div class="mt-4 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                            @foreach($friends as $friend)
                                <a href="{{ route('users.show', $friend ) }}?back=/profile"
                                    class="group rounded-xl border border-[#f3e7e8] bg-white p-3 hover:bg-[#f3e7e8]/40 transition">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-full overflow-hidden bg-[#f3e7e8] shrink-0">
                                            <img src="{{ $friend->avatar ?: 'https://i.pravatar.cc/150?u=' . $friend->id }}"
                                                alt="avatar" class="h-full w-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="text-sm font-bold text-[#1b0e0e] truncate group-hover:underline">
                                                {{ $friend->username ?? $friend->name }}
                                            </p>
                                            <p class="text-xs text-[#994d51] truncate">
                                                {{ $friend->email }}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>