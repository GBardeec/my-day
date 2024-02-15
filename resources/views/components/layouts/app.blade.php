<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name') }}</title>

        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>

        <title>{{ $title ?? 'Page Title' }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body>
        <header class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <h1 class="navbar-brand" href="#">#МойДень</h1>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{route('main')}}">Главная страница</a>
                        </li>
                    </ul>
                </div>

                <div class="form-inline my-2 my-lg-0">
                    <a href="{{route('login')}}" class="btn btn-outline-success my-2 my-sm-0" type="submit">Авторизация</a>
                </div>
            </nav>
        </header>
    <main class="container">
        {{ $slot }}
    </main>

        <livewire:modals.modals/>
        @livewireScripts
        @vite('resources/js/app.js')
    </body>
</html>
