
@extends('layouts.app')

@section('titre','Politique de Cookies')

@section('styles')
@vite('resources/css/style-etudiant.css')
@endsection

@section('main')
<div class="main-section">
    <div class="header-section">
        <h1 id="titre-offre">Politique de Cookies</h1>
    </div>
    <br><br>
    <div class="container">
        <h2>1. Introduction</h2>
        <p>Cette politique explique comment Stageo utilise des cookies pour améliorer votre expérience utilisateur.</p>

        <h2>2. Qu'est-ce qu'un cookie ?</h2>
        <p>Un cookie est un petit fichier texte stocké sur votre appareil lorsque vous visitez un site web. Il permet de
            mémoriser vos préférences et d'améliorer votre navigation.</p>

        <h2>3. Types de cookies utilisés</h2>
        <ul>
            <li><strong>Cookies essentiels :</strong> Nécessaires au bon fonctionnement du site.</li>
            <li><strong>Cookies de performance :</strong> Utilisés pour analyser l'utilisation du site et améliorer ses
                performances.</li>
            <li><strong>Cookies de personnalisation :</strong> Permettent de mémoriser vos préférences.</li>
        </ul>

        <h2>4. Gestion des cookies</h2>
        <p>Vous pouvez configurer votre navigateur pour accepter ou refuser les cookies. Notez que le refus des cookies
            essentiels peut affecter le fonctionnement du site.</p>

        <h2>5. Durée de conservation</h2>
        <p>Les cookies sont conservés pour une durée maximale de 13 mois, conformément à la réglementation en vigueur.</p>

        <h2>6. Contact</h2>
        <p>Pour toute question concernant cette politique, contactez-nous à <a href="mailto:contact@stageo.com">contact@stageo.com</a>.</p>
    </div>
    <br><br>
</div>
@endsection