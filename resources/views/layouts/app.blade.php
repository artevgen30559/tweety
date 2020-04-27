<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/ca76ee2803.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body>
    <div id="app">
        <header class="py-8">
            <div class="container mx-auto">
                <div class="grid">
                    <div class="logo">
                        <img class="w-32" src="/imgs/tweety-logo.svg">
                    </div>
                </div>
            </div>
        </header>
        <main class="main py-5">
            <div class="container mx-auto">
                <div class="flex wrapper">
                    <div class="left-sidebar w-1/6">@include ('includes._nav')</div>
                    <div class="tape flex-1 mx-10">@yield('content')</div>
                    <div class="w-1/5">@include ('includes._friends')</div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
