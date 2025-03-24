<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Stageo</title>
    @vite('resources/css/style-base.css')
    @vite('resources/css/style-login.css')
</head>
<body>
<div class="conteneur-auth flex-colonne centre-alignement">
    <div class="auth centre-alignement">
        <div class="texte-offre">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo-login">
            <h1>Connexion</h1>
            <h2>Authentifiez-vous pour accéder à la plateforme</h2>
        </div>
        <div class="entree-auth">
            <form action="{{ route('auth') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input class="email-entree" name="email" id="email-login" placeholder="Email" required type="text">
                <input id="mdp-login" name="password" placeholder="Mot de passe" required type="password">
                <button type="submit">Connexion</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>