<section class="friends bg-gray-200 p-10 rounded-lg">
    <h1 class="font-bold text-xl font-display mb-2 text-blue-600">Following</h1>
    <ul>
        @forelse (auth()->user()->follows as $follow)
            <li class="py-3 px-2 hover:bg-blue-200 rounded-lg">
                <a href="{{ route('profiles.show', $follow) }}" class="flex items-center">
                    <div class="avatar mr-5 w-12 h-12 overflow-hidden rounded-full">
                        <img src="{{ $follow->avatar }}" alt="">
                    </div>
                    <div class="name flex-1">
                        <span class="font-body text-sm">{{ $follow->name }}</span>
                    </div>
                </a>
            </li>
            @empty
                <li class="font-display font-bold text-lg text-gray-400">
                    Friends not found yet.
                </li>
        @endforelse
    </ul>
</section>
