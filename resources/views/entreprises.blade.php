
@extends('layouts.app')

@section('titre','Entreprises')

@section('styles') 
    @vite('resources/css/style-offres.css')
@endsection

@section('main')

    <div class="main-section">
        <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})" >
            <h1 id="titre-offre">Choisissez une entreprise</h1>
        </div>
        <div class="sub-section">
            <div class="offer-text">
                <h2>Liste des entreprises</h2>
            </div>
            <form id="login-form" method="post">
                <input id="input-recherche" placeholder="Rechercher une offre" required type="text">
                <select name="ville" id="ville-select">
                    <option value="">Toutes les villes</option>
                </select>
            </form>
            @foreach ($entreprises as $entreprise)
            <div class="offre">
                <a href="{{ route('focusEntreprise', ['id' => $entreprise->id]) }}">
                    <p>{{ $entreprise->nom }}</p>
                    <p>Note : {{ $entreprise->evaluation }}</p>
                </a>
            </div>
            @endforeach
        </div>
@endsection