@extends('layouts.app')

@section('content')
    <div class="create-tweet border border-blue-400 rounded-lg p-8 mb-10">
        <form method="POST" action="{{ route('tweets.store') }}" id="create-tweet__form" class="create-tweet__form">
            @csrf
            <textarea name="body" class="resize-none w-full text-lg outline-none" placeholder="{{ ($errors->isEmpty()) ? 'What\'s up, doc?' : $errors->first() }}"></textarea>
        </form>
        <hr class="mb-3">
        <div class="create-tweet__footer flex items-center justify-between">
            <div class="create-tweet__footer-avatar rounded-full w-8 h-8 overflow-hidden">
                <img src="{{ auth()->user()->avatar }}" alt="">
            </div>
            <button type="submit" form="create-tweet__form" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded-lg">Tweet-a-roo!</button>
        </div>
    </div>
    @include ('includes._timeline', [
        'tweets' => auth()->user()->getAllTweets()
    ])
@endsection
