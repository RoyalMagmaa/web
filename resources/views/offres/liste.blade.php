
@extends('layouts.app')

@section('titre','Accueil')

@section('styles') 
    @vite('resources/css/style-liste.css')
@endsection

@section('main')
    <div class="main-section">
        <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})" >
            <h1 id="titre-offre">Choisissez le stage qui vous correspond</h1>
        </div>
        <div class="sub-section">
            <div class="haut-liste">
                <div>
                    <h2>Liste des offres</h2>
                </div>
                @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
                <a id="boutonCreer" href="{{ route('offres.creer') }}">Ajouter une offre</a>
                @endif
            </div>
            <form id="login-form" method="post">
                <input id="input-recherche" placeholder="Rechercher une offre" required type="text">
                <select name="ville" id="ville-select">
                    <option value="">Toutes les villes</option>
                </select>
            </form>
            @foreach ($offres as $offre)
            <div class="element-liste">
                <a href="{{ route('offres.modifier', $offre) }}">Modifier</a>
                <a href="{{ route('offres.focus', ['id' => $offre->id]) }}">
                    <p>{{ $offre->titre }}</p>
                    <p>Description : {{ $offre->description }}</p>
                </a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
