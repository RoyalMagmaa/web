<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>offres</title>
    <link href="/web/public/assets/css/style-base.css" rel="stylesheet">
    <link href="/web/public/assets/css/style-offres.css" rel="stylesheet">
    <link href="fonts/fontawesome 6.3/css/solid.css" rel="stylesheet">
    <link href="fonts/fontawesome 6.3/css/regular.css" rel="stylesheet">
    <script defer src="/script/jquery/jquery-3.7.1.js"></script>
    <script defer src="script/components.js"></script>
    <script defer src="script/input-validation.js"></script>
    <!-- PWA -->
    <link rel="manifest" href="manifest.json" />
    <link rel="apple-touch-icon" href="/img/Square44x44Logo.altform-unplated_targetsize-96.png">
    <meta name="thewme-color" content="#FFFFFF">
    <!-- /PWA -->
</head>
<body>
    <header>
        <nav>
            <div class="navbar" id="reconnect">
                <a href="login.html">Se reconnecter</a>
            </div>
            <div class="navbar">
				<a href="offres.html">Offres</a>
                <a href="entreprises.html">entreprises</a>
			</div>
            <div class="navbar" id="wishlist-button">
                <a href="wishlist.html">Liste de souhaits</a>
            </div>
        </nav>
    </header>
    <div class="main-section">
        <div class="header-section">
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
            <div class="offre">
                <h2>Titre de l'annonce</h2>
                <p>Sur site</p>
                <p>Nom de la ville, Région</p>
            </div>
        </div>
    </div>
</body>
</html>