@extends('layouts.app')

@section('titre','Politique de Confidentialité')

@section('styles')
@vite('resources/css/style-etudiant.css')
@endsection

@section('main')
<div class="main-section">
    
    <div class="header-section">
        <h1 id="titre-offre">Politique de Confidentialité</h1>
    </div>
    <br><br>
    <div class="container">
        <h2>1. Introduction</h2>
        <p>Chez Stageo, nous accordons une grande importance à la confidentialité de vos données personnelles. Cette
            politique explique comment nous collectons, utilisons et protégeons vos informations.</p>

        <h2>2. Données collectées</h2>
        <p>Nous collectons les données suivantes :</p>
        <ul>
            <li>Informations personnelles : nom, prénom, email, téléphone.</li>
            <li>Informations professionnelles : CV, lettre de motivation.</li>
            <li>Données de navigation : adresse IP, type de navigateur, pages visitées.</li>
        </ul>

        <h2>3. Utilisation des données</h2>
        <p>Vos données sont utilisées pour :</p>
        <ul>
            <li>Gérer votre compte utilisateur.</li>
            <li>Faciliter vos candidatures aux offres de stage.</li>
            <li>Améliorer nos services et personnaliser votre expérience.</li>
        </ul>

        <h2>4. Partage des données</h2>
        <p>Vos données ne sont partagées qu'avec :</p>
        <ul>
            <li>Les entreprises proposant des offres de stage sur notre plateforme.</li>
            <li>Les prestataires techniques nécessaires au fonctionnement du site.</li>
        </ul>

        <h2>5. Sécurité des données</h2>
        <p>Nous mettons en œuvre des mesures techniques et organisationnelles pour protéger vos données contre tout
            accès non autorisé, perte ou altération.</p>

        <h2>6. Vos droits</h2>
        <p>Conformément au RGPD, vous disposez des droits suivants :</p>
        <ul>
            <li>Droit d'accès, de rectification et de suppression de vos données.</li>
            <li>Droit d'opposition au traitement de vos données.</li>
            <li>Droit à la portabilité de vos données.</li>
        </ul>
        <p>Pour exercer vos droits, contactez-nous à <a href="mailto:rgpd@stageo.com">rgpd@stageo.com</a>.</p>

        <h2>7. Modifications</h2>
        <p>Nous nous réservons le droit de modifier cette politique à tout moment. Les modifications seront publiées sur
            cette page.</p>
    </div>
    <br><br>
</div>

@endsection