@extends ('layouts.app')

@section ('content')
    <div class="settings border border-blue-500 rounded-lg">
        <form action="{{ route('profiles.update', $user) }}"
              enctype="multipart/form-data"
              method="POST"
              class="p-10">
            @csrf
            @method('PATCH')
            <h1 class="font-display text-lg text-blue-500 font-bold mb-5 text-center">My Profile Settings</h1>
            <div class="mb-4">
                <label for="name"
                       class="block text-gray-700 text-sm font-bold mb-2">Username</label>
                <input type="text"
                       name="name"
                       id="name"
                       value="{{ $user->name }}"
                       class="appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('name') is-invalid @enderror">

                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="name"
                       class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="text"
                       name="email"
                       id="email"
                       value="{{ $user->email }}"
                       class="appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('email') is-invalid @enderror">

                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="avatar"
                       class="block text-gray-700 text-sm font-bold mb-2">Avatar</label>
                <input type="file"
                       name="avatar"
                       id="avatar"
                       class="appearance-none w-full py-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                        @error('avatar') is-invalid @enderror">
                @error('avatar')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <button class="mt-5 mr-5 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded-lg">Change settings</button>
                <a href="{{ route('profiles.show', $user) }}">
                    <button class="bg-gray-300 hover:bg-gray-200 text-blue-500 font-bold py-2 px-4
                border-b-4 border-gray-500 hover:border-gray-400 rounded-lg">Cancel</button>
                </a>
            </div>
        </form>
    </div>
@endsection
