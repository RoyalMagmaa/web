<?php
// Exemple de code PHP pour gérer la logique de la page
$pageTitle = "Page centrale"; // Titre de la page
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="style.css"> <!-- Lien vers le fichier CSS -->
</head>
<body>

    <header>
        <h1>Bienvenue sur la page centrale</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="about.php">À propos</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Contenu principal</h2>
            <p>Ceci est un exemple de page centrale avec du contenu dynamique géré par PHP.</p>
            <button id="dynamicButton">Cliquez ici</button>
        </section>
        
        <section>
            <h2>Information supplémentaire</h2>
            <p>Le contenu de cette section est géré par PHP et peut être modifié selon les actions de l'utilisateur.</p>
            <?php
            // Exemple de code PHP conditionnel
            $currentDate = date("Y-m-d H:i:s");
            echo "<p>La date et l'heure actuelle : $currentDate</p>";
            ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2025 Mon Site Web</p>
    </footer>

    <script src="script.js"></script> <!-- Lien vers le fichier JavaScript -->
</body>
</html>
