<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Stageo</title>
    <link href="/web/public/assets/css/style-login.css" rel="stylesheet">
    <link href="/web/public/assets/css/style-base.css" rel="stylesheet">
</head>
<body>
<div class="conteneur-auth flex-colonne centre-alignement">
    <div class="auth centre-alignement">
        <div class="texte-offre">
            <div class="logo-container">
                <img src="/web/public/assets/img/logo.png" alt="Logo" class="logo-login">
            </div>
            <div class="text-container">
                <h1>Créer une entreprise</h1>
                <h2>Remplissez les informations pour créer une nouvelle entreprise</h2>
            </div>
        </div>
        <div class="entree-auth">
            <form id="formulaire-createcompany" method="post" action="submitcompany.php">
                <input class="nom-entree" id="nom-company" name="nom" placeholder="Nom de l'entreprise" required type="text">
                <textarea id="description-company" name="description" placeholder="Description de l'entreprise" required></textarea>
                <input class="email-entree" id="email-contact" name="email" placeholder="Email de contact" required type="email">
                <input id="telephone-contact" name="telephone" placeholder="Téléphone de contact" required type="tel">
                <button type="submit">Créer</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>