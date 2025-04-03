<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('titre')</title>
    @vite('resources/css/style-base.css')
    @vite('resources/js/app.js')
    @yield('styles') {{-- Styles spécifiques à chaque page --}}
    <meta name="theme-color" content="#18206F">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <header>
        @include('layouts.header')
    </header>

    <main>
        @yield('main')
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
</body>
</html>