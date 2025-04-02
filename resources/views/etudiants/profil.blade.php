@extends('layouts.app')

@section('titre', 'Mon Profil')

@section('styles')
    @vite('resources/css/style-focus.css')
    @vite('resources/css/style-profil.css')
@endsection

@section('main')
<div class="container">
    <div class="focus-offre">
        <div class="header">
            <h1>Mon Profil</h1>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="content">
            <div class="section">
                <h2>Informations personnelles</h2>
                <p><strong>Nom :</strong> {{ $etudiant->nom }}</p>
                <p><strong>Prénom :</strong> {{ $etudiant->prenom }}</p>
                <p><strong>Email :</strong> {{ $etudiant->email }}</p>
            </div>

            <div class="section">
                <h2>Modifier mon statut</h2>
                <form id="form-modif" action="{{ route('profil.modifier_statut') }}" method="POST">
                    @csrf
                    <select name="statut" id="statut">
                        <option value="En recherche" {{ $etudiant->statut->nom_statut === 'En recherche' ? 'selected' : '' }}>En recherche</option>
                        <option value="En stage" {{ $etudiant->statut->nom_statut === 'En stage' ? 'selected' : '' }}>En stage</option>
                    </select>
                    <button id=bouton-maj type="submit">Mettre à jour</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection