<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>GestionPilote</title>
    @vite('resources/css/style-gestionPilotes.css')
    @vite('resources/css/style-base.css')
    <meta name="theme-color" content="#FFFFFF">
    <!-- /PWA -->
</head>

<body>
    <header>
        <nav>
            <div class="navbar" id="reconnect">
                <a href="login.html">Se reconnecter</a>
            </div>
            <div class="navbar">
                <a href="offres.html">Les Offres</a>
                <a href="entreprises.html">Les entreprises</a>
            </div>
            <div class="navbar" id="wishlist-button">
                <a href="wishlist.html">Liste de souhaits</a>
            </div>
        </nav>
    </header>
    <div class="main-section">
        <div class="header-section">
            <h1 id="titre-offre">Gestion des Pilotes</h1>
        </div>
        <div class="container">
            <!-- Section des Offres -->
            <div class="offers-section">
                <h2>Pilotes</h2>
                <form id="search-form" method="post">
                    <input id="input-recherche" placeholder="Rechercher un Pilote" required type="text">
                    <button type="submit" class="boutonelio">Rechercher</button>
                </form>
                <div class="offre">
                    <h2>NOM Prénom</h2>
                    <p>Sur site</p>
                    <p>Nom de la ville, Région</p>
                </div>
            </div>

            <!-- Section des Formulaires -->
            <div class="forms-section">
                <h2>Gestion des Pilotes</h2>
                <form id="create-form" method="post">
                    <input id="input-nom" placeholder="Nom" required type="text">
                    <input id="input-prenom" placeholder="Prénom" required type="text">
                    <button type="submit" class="boutonelio">Créer</button>
                </form>
                <form id="update-form" method="post">
                    <input id="update-id" placeholder="ID du Pilote" required type="text">
                    <input id="update-nom" placeholder="Nom" required type="text">
                    <input id="update-prenom" placeholder="Prénom" required type="text">
                    <button type="submit" class="boutonelio">Modifier</button>
                </form>
                <form id="delete-form" method="post">
                    <input id="delete-id" placeholder="ID du Pilote" required type="text">
                    <button type="submit" class="boutonelio">Supprimer</button>
                </form>
            </div>
        </div>

    </div>
    </div>
    <footer>
        <div class="footer">
            <p>© 2025 - Tous droits réservés</p>
        </div>
    </footer>
</body>

</html>