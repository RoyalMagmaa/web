
@extends('layouts.app')

@section('titre','Wishlist')

@section('styles') 
    @vite('resources/css/style-etudiant.css')
@endsection

@section('main')
    <div class="main-section">
        <div class="header-section">
            <h1 id="titre-offre">Votre Wishlist</h1>
        </div>
        <div class="sub-section" id="wishlist-container">
            <!-- Annonces simulées -->
            <div class="offre">
                <h2>Stage Développeur Web</h2>
                <p>Sur site</p>
                <p>Lyon, Auvergne-Rhône-Alpes</p>
            </div>
            <div class="offre">
                <h2>Stage Administrateur Réseau</h2>
                <p>Sur site</p>
                <p>Paris, Île-de-France</p>
            </div>
        </div>
    </div>
@endsection