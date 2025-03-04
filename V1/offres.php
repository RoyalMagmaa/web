<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>offres</title>
    <link href="style.css" rel="stylesheet">
    <link href="fonts/fontawesome 6.3/css/solid.css" rel="stylesheet">
    <link href="fonts/fontawesome 6.3/css/regular.css" rel="stylesheet">
    <script defer src="/script/jquery/jquery-3.7.1.js"></script>
    <script defer src="script/components.js"></script>
    <script defer src="script/input-validation.js"></script>
    <!-- PWA -->
    <link rel="manifest" href="manifest.json" />
    <link rel="apple-touch-icon" href="/img/Square44x44Logo.altform-unplated_targetsize-96.png">
    <meta name="theme-color" content="#FFFFFF">
    <!-- /PWA -->
</head>
<body>
    <header>
        <nav>
            <div class="navbar" id="reconnect">
                <a href="login.php">Se reconnecter</a>
            </div>
            <div class="navbar">
                <a href="offres.php">Les Offres</a>
                <a href="entreprises.php">Les entreprises</a>
            </div>
            <div class="navbar" id="wishlist-button">
                <a href="wishlist.php">Liste de souhaits</a>
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
            
            <div class="offre" data-id="1">
                <div class="wishlist-icon" onclick="toggleWishlist(this)">
                    &#9825;
                </div>
                <h2>Stage Développeur Web</h2>
                <p>Sur site</p>
                <p>Lyon, Auvergne-Rhône-Alpes</p>
            </div>
            
            <div class="offre" data-id="2">
                <div class="wishlist-icon" onclick="toggleWishlist(this)">
                    &#9825;
                </div>
                <h2>Stage Administrateur Réseau</h2>
                <p>Sur site</p>
                <p>Paris, Île-de-France</p>
            </div>
            
            <div class="offre" data-id="3">
                <div class="wishlist-icon" onclick="toggleWishlist(this)">
                    &#9825;
                </div>
                <h2>Stage Ingénieur Sécurité</h2>
                <p>Sur site</p>
                <p>Marseille, Provence-Alpes-Côte d'Azur</p>
            </div>
        </div>
    </div>
    
    <script>
        function toggleWishlist(element) {
            if (element.innerHTML === "\u2661") { // Cœur vide
                element.innerHTML = "\u2764"; // Cœur plein
            } else {
                element.innerHTML = "\u2661";
            }
        }
    </script>
</body>
</html>