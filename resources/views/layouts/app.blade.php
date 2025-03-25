<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>@yield('titre')</title>
    @vite('resources/css/style-base.css')
    @vite('resources/css/style-offres.css')
    <meta name="theme-color" content="#18206F">
</head>
<body>
    <header>
        @include('layouts.navbar')
    </header>

    <main>
        @yield('main')
    </main>

    <footer>
        <div class="footer">
            <p>© 2025 - Tous droits réservés</p>
        </div>
    </footer>
</body>
</html>