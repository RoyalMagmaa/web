<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="navbar" id="reconnect">
                <a href="#">Se reconnecter</a>
            </div>
            <div class="navbar">
                <a href="etudiants.html">Les Étudiants</a>
                <a href="#">Les entreprises</a>
            </div>
            <div class="navbar" id="wishlist-button">
                <a href="#">Liste de souhaits</a>
            </div>
        </nav>
    </header>
    <div class="main-section">
        <div class="header-section">
            <h1 id="titre-offre">Gestion des comptes étudiants</h1>
        </div>
        <div class="sub-section">
            <div class="offer-text">
                <h2>Comptes étudiants</h2>
                <a href="create-student.html" class="create-button">Créer un compte</a>
            </div>
            <div class="search-container">
                <div class="search-box">
                    <i class="search-icon">🔍</i>
                    <input id="input-recherche" placeholder="Rechercher un étudiant" type="text">
                </div>
                <select name="status" id="status-select">
                    <option value="">Tous les statuts</option>
                    <option value="En recherche">En recherche</option>
                    <option value="Stage trouvé">Stage trouvé</option>
                    <option value="En attente">En attente</option>
                </select>
            </div>
            <div id="students-container" class="students-grid">
                <!-- Student cards will be inserted here by JavaScript -->
            </div>
            <div id="no-results" class="no-results hidden">
                <p>Aucun étudiant trouvé</p>
            </div>
            <div id="loading" class="loading">
                <div class="spinner"></div>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Gestion des Étudiants. Tous droits réservés.</p>
            <a href="mentions-legales.html">Mentions légales</a>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>