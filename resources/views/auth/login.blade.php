@extends ('layouts.auth')

@section('content')

<div class="container mx-auto">
    <div class="h-screen flex items-center justify-center">
        <div class="app-logo flex justify-center h-screen bg-gray-100 px-40 mr-10">
            <img class="w-64" src="imgs/tweety-logo.svg" alt="asd">
        </div>
        <div class="w-full max-w-lg">
            <form method="POST" action="{{ route('login') }}"
                  class="border border-blue-500 rounded-lg px-8 pt-6 pb-8">
                @csrf
                <div class="my-5 font-display font-bold text-lg text-blue-500 text-center">{{ __('Login in Tweety') }}</div>

                <div class="mb-4">
                    <label for="email"
                           class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>

                    <input id="email"
                           type="email"
                           class="appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                                        @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}"
                           autocomplete="email" autofocus>

                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror

                </div>

                <div class="form-group row">
                    <label for="password"
                           class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password"
                               type="password"
                               class="appearance-none border rounded-full w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline
                                       @error('password') is-invalid @enderror"
                               name="password"
                               value="{{ old('password') }}"
                               autocomplete="password" autofocus>

                        @error('password')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4 text-center">
                        <button type="submit"
                                class="mt-5 mr-5 bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded-lg w-32">
                            {{ __('Login') }}
                        </button>
                        <a href="{{ route('register') }}" class="font-body text-sm text-blue-500">
                            or Register
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
