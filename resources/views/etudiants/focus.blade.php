@extends('layouts.app')

@section('titre','Etudiant')

@section('styles') 
    @vite('resources/css/style-focus.css')
@endsection

@section('main')

<div class="container">
    <div class="focus-offre">
        <div class="header">
            <h1>{{ $etudiant->prenom }} {{ $etudiant->nom }}</h1>
        </div>

        <div class="content">
            <div class="section">
                <h2>Identifiants</h2>
                <p>{{ $etudiant->email }}</p>
                <p>statut :{{ $etudiant->statut->nom_statut}}</p>
            </div>

            <div class="section">
                <h2>Statistiques</h2>
            </div>
        </div>
    </div>
</div>

@endsection