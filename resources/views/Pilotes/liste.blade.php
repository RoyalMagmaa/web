@extends('layouts.app')

@section('titre','Pilotes')

@section('styles') 
    @vite('resources/css/style-liste.css')
@endsection

@section('main')

    <div class="main-section">
        <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})" >
            <h1 id="titre-offre">Liste des pilotes</h1>
        </div>
        <div class="sub-section">
            <div class="haut-liste">
                <div>
                    <h2>Liste des pilotes</h2>
                </div>
                @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
                <a id="boutonCreer" href="{{ route('pilotes.creer') }}">Ajouter un pilote</a>
                @endif
            </div>
            <form id="login-form" method="post">
                <input id="input-recherche" placeholder="Rechercher une offre" required type="text">
                <select name="ville" id="ville-select">
                    <option value="">Toutes les villes</option>
                </select>
            </form>
            @foreach ($pilotes as $pilote)
            <div class="element-liste">
                <a href="{{ route('pilotes.modifier', $pilote) }}">Modifier</a>
                <a href="{{ route('pilotes.focus', ['id' => $pilote->id]) }}">
                    <p>{{ $pilote->prenom }} {{ $pilote->nom }}</p>        
                </a>
            </div>
            @endforeach
        </div>
@endsection