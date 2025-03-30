@extends('layouts.app')

@section('titre','Offre')

@section('styles') 
    @vite('resources/css/style-focus.css')
@endsection

@section('main')

<div class="container">
    <div class="focus-offre">
        <div class="header">
            <h1>{{ $offre->titre }}</h1>
            <p class="nom-entreprise">📌 Proposé par : {{ $offre->entreprise->nom }}</p>
        </div>

        <div class="content">
            <div class="section">
                <h2>Description</h2>
                <p>{{ $offre->description }}</p>
            </div>

            <div class="section">
                <h2>Détails de l'offre</h2>
                <p><strong>Salaire :</strong> {{ $offre->salaire }} €</p>
                <p><strong>Date de début :</strong> {{ $offre->date_debut }}</p>
                <p><strong>Date de fin :</strong> {{ $offre->date_fin }}</p>
            </div>
        </div>
    </div>
</div>

@endsection