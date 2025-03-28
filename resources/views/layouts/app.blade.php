<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('titre')</title>
    @vite('resources/css/style-base.css')
    @yield('styles') {{-- Styles spécifiques à chaque page --}}
    <meta name="theme-color" content="#18206F">
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