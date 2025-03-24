<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Wishlist</title>
    @vite('resources/css/style-base.css')
    @vite('resources/css/style-etudiant.css')
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
                <a href="{{ route('offres') }}">Retour aux Offres</a>
            </div>
        </nav>
    </header>
    <div class="main-section">
        <div class="header-section">
            <h1 id="titre-offre">Votre Wishlist</h1>
        </div>
        <div class="sub-section" id="wishlist-container">
            <!-- Annonces simulées -->
            <div class="offre">
                <h2>Stage Développeur Web</h2>
                <p>Sur site</p>
                <p>Lyon, Auvergne-Rhône-Alpes</p>
            </div>
            <div class="offre">
                <h2>Stage Administrateur Réseau</h2>
                <p>Sur site</p>
                <p>Paris, Île-de-France</p>
            </div>
        </div>
    </div>
</body>
</html>