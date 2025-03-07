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
            <img src="/web/public/assets/img/logo.png" alt="Logo" class="logo-login">
            <h1>Connexion</h1>
            <h2>Authentifiez-vous pour accéder à la plateforme</h2>
        </div>
        <div class="entree-auth">
            <form id="formulaire-login" method="post">
                <input class="email-entree" id="email-login" placeholder="Email" required type="text">
                <input id="mdp-login" placeholder="Mot de passe" required type="password">
                <button onclick="checkForm()" type="button">Connexion</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>