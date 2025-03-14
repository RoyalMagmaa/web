<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un compte étudiant</title>
    <link href="/web/public/assets/css/style-etudiant.css" rel="stylesheet">
    <link href="/web/public/assets/css/style-base.css" rel="stylesheet">
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
            <h1 id="titre-offre">Modifier un compte étudiant</h1>
        </div>
        <div class="sub-section">
            <div class="form-container">
                <h2 class="form-title">Informations de l'étudiant</h2>
                <form id="edit-student-form">
                    <input type="hidden" id="studentId" name="studentId">
                    <div class="form-group">
                        <label for="firstName" class="form-label">Prénom</label>
                        <input type="text" id="firstName" name="firstName" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="form-label">Nom</label>
                        <input type="text" id="lastName" name="lastName" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Statut</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="En recherche">En recherche</option>
                            <option value="Stage trouvé">Stage trouvé</option>
                            <option value="En attente">En attente</option>
                        </select>
                    </div>
                    <div class="form-buttons">
                        <a href="etudiants.html" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; 2025 Gestion des Étudiants. Tous droits réservés.</p>
            <a href="mentions-legales.html">Mentions légales</a>
        </div>
    </footer>
    <script src="edit-student.js"></script>
</body>
</html>