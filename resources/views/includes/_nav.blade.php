<section class="nav">
    <ul>
        <li class="mb-5"><a class="hover:text-blue-500 font-bold text-lg font-display"
                            href="{{ route('tweets.index') }}">Home</a></li>

        <li class="mb-5"><a class="hover:text-blue-500 font-bold text-lg font-display"
                            href="{{ route('explore.index') }}">Explore</a></li>

        <li class="mb-5"><a class="hover:text-blue-500 font-bold text-lg font-display"
                            href="{{ route('profiles.show', auth()->user()) }}">Profile</a></li>

        <li class="mb-5"><a class="hover:text-blue-500 text-gray-500 font-bold text-lg font-display" href="{{ route('profiles.logout') }}">Logout</a></li>
    </ul>
</section>

