<div class="tweet flex p-8 {{ $loop->last ? '' : 'border-b border-gray-300' }}">
    <div class="tweet__user-avatar w-1/12 mr-5">
        <div class="avatar w-12 h-12 rounded-full overflow-hidden">
            <img src="{{ $tweet->user->avatar }}">
        </div>
    </div>
    <div class="flex-1">
        <div class="tweet__user-name mb-3 flex">
            <a href="{{ route('profiles.show', $tweet->user) }}"
               class="text-sm font-bold mr-3 hover:text-blue-500">{{ $tweet->user->name }}</a>
            <div class="tweet__created-at">
                <span href="#" class="text-sm font-bold text-gray-500">5h</span>
            </div>
        </div>
        <div class="tweet__body text-base">
            <p>{{ $tweet->body }}</p>
        </div>
        <div class="tweet__footer flex mt-2 border-t border-gray-200">
            <form action="{{ route('tweets.like', $tweet->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="tweet__like mr-2 text-blue-500 text-sm hover:bg-gray-200
            p-2
            rounded-full">
                    <span href="#"><i class="fas fa-thumbs-up"></i> {{ $tweet->likes ?: '0'}}</span>
                </button>
            </form>
            <form action="{{ route('tweets.dislike', $tweet->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="tweet__dislike text-red-500 text-sm hover:bg-gray-200 p-2
            rounded-full">
                <span href="#"><i class="fas fa-thumbs-down"></i> {{ $tweet->dislikes ?:
                '0'}}</span>
                </button>
            </form>
        </div>
    </div>
</div>
