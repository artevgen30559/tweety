@extends ('layouts.app')

@section ('content')
    <div class="grid grid-cols-2 gap-3">
        @forelse ($users as $user)
            <a href="{{ route('profiles.show', $user) }}"
               class="user flex items-center border border-gray-300 rounded-lg p-3
               hover:bg-blue-200">
                <div class="avatar mr-5 h-12 w-12 overflow-hidden rounded-full">
                    <img src="{{ $user->avatar }}" alt="">
                </div>
                <span class="user-name font-display font-bold text-base text-gray-500 flex-1">
                    {{ '@' .$user->name }}</span>
            </a>
        @empty
            <p class="font-display font-bold text-lg text-gray-400">
                Users not found yet.
            </p>
        @endforelse
    </div>
@endsection
