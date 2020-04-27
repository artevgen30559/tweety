@extends ('layouts.app')

@section ('content')

    <header class="profile mb-10">
        <div class="profile__background rounded-lg mb-5">
            <img src="/imgs/image_processing20200322-8438-tgvbov.png">
        </div>
        <div class="profile__head flex justify-between mb-5">
            <div class="profile__info">
                <h3 class="profile__name font-display text-xl font-bold ">{{ $user->name
                }}</h3>
                <span class="profile__joined font-body text-base text-gray-500">Joined 2 days ago</span>
            </div>
            <div class="profile__actions flex">
                @can ('edit', $user)
                    <form action="{{ route('profiles.edit', $user) }}" method="GET" class="mr-5">
                        <button type="submit" class="bg-gray-300 hover:bg-gray-200 text-blue-500 font-bold py-2 px-4 border-b-4 border-gray-500 hover:border-gray-400 rounded-lg">Edit profile</button>
                    </form>
                @endcan
                <x-follow-button :user="$user"/>

            </div>
        </div>
        <div class="profile__body text-center text-sm font-body text-gray-900 font-weight-light">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos eos, esse et, explicabo fugiat in natus obcaecati, odio placeat quaerat sequi voluptatum? Accusantium eius explicabo natus necessitatibus officia omnis provident!</p>
        </div>
        <div class="profile__avatar rounded-full w-40 h-40">
            <img class="shadow-md" src="{{ $user->avatar }}" alt="">
        </div>
    </header>

    @include ('includes._timeline', [
        'tweets' => $tweets
    ])
@endsection
