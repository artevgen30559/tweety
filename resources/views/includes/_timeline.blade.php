<div class="tweets border border-gray-300 rounded-lg">
    @forelse ($tweets as $tweet)
        @include ('includes._tweet')
        @empty
        <div class="tweet flex p-8">
            <span class="font-display font-bold text-lg text-gray-400">@ Tweets not found yet.</span>
        </div>
    @endforelse
</div>
