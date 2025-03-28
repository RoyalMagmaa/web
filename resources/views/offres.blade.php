
@extends('layouts.app')

@section('titre','Accueil')

@section('styles') 
    @vite('resources/css/style-offres.css')
@endsection

@section('main')
    <div class="main-section">
        <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})" >
            <h1 id="titre-offre">Choisissez le stage qui vous correspond</h1>
        </div>
        <div class="sub-section">
            <div class="offer-text">
                <h2>Offres de stages</h2>
            </div>
            <form id="login-form" method="post">
                <input id="input-recherche" placeholder="Rechercher une offre" required type="text">
                <select name="ville" id="ville-select">
                    <option value="">Toutes les villes</option>
                </select>
            </form>
        </div>
    </div>
@endsection
