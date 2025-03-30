@extends('layouts.app')

@section('titre','Etudiants')

@section('styles') 
    @vite('resources/css/style-liste.css')
@endsection

@section('main')

    <div class="main-section">
        <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})" >
            <h1 id="titre-offre">Liste des etudiants</h1>
        </div>
        <div class="sub-section">
            <div class="haut-liste">
                <div>
                    <h2>Liste des etudiants</h2>
                </div>
                @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
                <a id="boutonCreer" href="{{ route('etudiants.creer') }}">Ajouter un etudiant</a>
                @endif
            </div>
            <form id="login-form" method="post">
                <input id="input-recherche" placeholder="Rechercher une offre" required type="text">
                <select name="ville" id="ville-select">
                    <option value="">Toutes les villes</option>
                </select>
            </form>
            @foreach ($etudiants as $etudiant)
            <div class="element-liste">
                <a href="{{ route('etudiants.modifier', $etudiant) }}">Modifier</a>
                <a href="{{ route('etudiants.focus', ['id' => $etudiant->id]) }}">
                    <p>{{ $etudiant->prenom }} {{ $etudiant->nom }}</p>
                    <p>{{ $etudiant->statut->nom_statut }}</p>
                    
                </a>
            </div>
            @endforeach
        </div>
@endsection