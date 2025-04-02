@extends('layouts.app')

@section('titre','Mentions Légales')

@section('styles')
@vite('resources/css/style-etudiant.css')
@endsection

@section('main')
<div class="main-section">
    <div class="header-section">
        <h1 id="titre-offre">Mentions Légales</h1>
    </div>
    <br><br>
    <div class="container">
        <h2>Mentions Légales</h2>
        <h2>1. Éditeur du site</h2>
        <p><strong>Nom de l'entreprise :</strong> Stageo</p>
        <p><strong>Forme juridique :</strong> SAS</p>
        <p><strong>Capital social :</strong> 100 000 €</p>
        <p><strong>Siège social :</strong> 15C Avenue Albert Einstein, 69100 Villeurbanne, France</p>
        <p><strong>Numéro SIRET :</strong> 123 456 789 00012</p>
        <p><strong>RCS :</strong> Lyon</p>
        <p><strong>Contact :</strong> <a href="mailto:contact@stageo.com">contact@stageo.com</a> / +33 1 23 45 67 89</p>
        <p><strong>Directeur de la publication :</strong> Jean-Marie Bigard</p>

        <h2>2. Hébergeur du site</h2>
        <p><strong>Nom de l'hébergeur :</strong> Microsoft Azure</p>
        <p><strong>Adresse :</strong> Microsoft Corporation, One Microsoft Way, Redmond, WA 98052-6399, USA</p>
        <p><strong>Contact :</strong> <a href="mailto:azuresupport@microsoft.com">azuresupport@microsoft.com</a> / +1 800 642 7676</p>

        <h2>3. Propriété intellectuelle</h2>
        <p>L'ensemble des contenus présents sur ce site (textes, images, logos, etc.) sont protégés par le droit d'auteur
            et sont la propriété exclusive de Stageo, sauf mention contraire. Toute reproduction, distribution ou
            utilisation sans autorisation préalable est interdite.</p>

        <h2>4. Données personnelles</h2>
        <p>Les informations collectées sur ce site sont traitées dans le respect du
            <abbr title="Règlement Général sur la Protection des Données">RGPD</abbr>. Vous disposez d'un droit d'accès,
            de rectification et de suppression de vos données personnelles. Pour toute demande, veuillez contacter :
            <a href="mailto:rgpd@stageo.com">rgpd@stageo.com</a>.
        </p>

        <h2>5. Responsabilités</h2>
        <p>Stageo ne saurait être tenue responsable en cas d'interruption du site, de bugs, ou de tout dommage
            résultant de son utilisation.</p>

        <h2>6. Droit applicable</h2>
        <p>Les présentes mentions légales sont soumises au droit français. En cas de litige, les tribunaux compétents
            seront ceux du ressort du siège social de l'entreprise.</p>
    </div>
    <br><br>
</div>
@endsection