@extends('layouts.app')

@section('titre','Entreprise')

@section('styles') 
    @vite('resources/css/style-focus.css')
@endsection

@section('main')

<div class="container">
    <div class="focus-entreprise">
        <div class="header">
            <h1>{{ $entreprise->nom }}</h1>
            <p class="evaluation">⭐ {{ $entreprise->evaluation }} / 5</p>
        </div>

        <div class="content">
            <div class="section">
                <h2>Description</h2>
                <p>{{ $entreprise->description }}</p>
            </div>

            <div class="section">
                <h2>Contact</h2>
                <p><strong>Email :</strong> {{ $entreprise->email }}</p>
                <p><strong>Téléphone :</strong> {{ $entreprise->telephone }}</p>
            </div>

            <div class="section">
                <h2>Statistiques</h2>
                <p><strong>Nombre d'offres publiées : </strong> {{ $entreprise->offres_count }}</p>
                <p><strong>Nombre total de candidatures : </strong> {{ $totalCandidatures }}</p>
            </div>
        </div>
        @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
        <div class="button-offre">
            <a href="{{ route('entreprises.modifier', $entreprise) }}">Modifier</a>
            <form action="{{ route('entreprises.supprimer', $entreprise->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette entreprise ?');">
                @csrf
                @method('DELETE')
                <button id="supprimer" type="submit">Supprimer</button>
            </form>
        </div>
        @endif
    </div>
</div>

@endsection