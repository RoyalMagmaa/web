<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>offres</title>
    @vite('resources/css/style-base.css')
    @vite('resources/css/style-offres.css')
    <meta name="thewme-color" content="#FFFFFF">
    <!-- /PWA -->
</head>
<body>
    <header>
        <nav>
            <div class="navbar" id="logo">
                <img src="{{ asset('images/logo.png') }}">
            </div>
            <div class="navbar">
				<a href="{{ route('offres') }}">Offres</a>
                <a href="{{ route('entreprises') }}">Entreprises</a>
			</div>
            <div class="navbar" id="profil-menu">
                <img src="{{ asset('images/utilisateur.png') }}">
            </div>
        </nav>
    </header>
    <div class="main-section">
        <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})" >
            <h1 id="titre-offre">Choisissez le stage qui vous correspond</h1>
        </div>
        <div class="sub-section">
            <div class="offer-text">
                <h2>Offres de stages</h2>
            </div>
            <form id="login-form" method="post">
                <input id="input-recherche" placeholder="Rechercher une offre" required type="text">
                <select name="ville" id="ville-select">
                    <option value="">Toutes les villes</option>
                </select>
            </form>
        </div>
        
    </div>
    <footer>
        <div class="footer">
            <p>© 2025 - Tous droits réservés</p>
        </div>
    </footer>
</body>
</html>