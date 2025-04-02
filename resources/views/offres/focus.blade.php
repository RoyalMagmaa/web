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
            <div class="section">
                <h2>Statistiques</h2>
                <p><strong>Nombre de candidats : </strong> {{ $offre->candidatures_count }}</p>
            </div>
        </div>
        @if(Auth::user()->role->nom_role === 'Etudiant')
        <div class=button-offre>
            <a href="{{ route('candidatures', ['offre_id' => $offre->id]) }}">Postuler</a>
            <form action="{{ route('wishlist.ajouter', ['offre_id' => $offre->id]) }}" method="POST">
                @csrf
                <button type="submit" class="bouton-wishlist">Ajouter à la wishlist +</button>
            </form>
        </div>
        @elseif(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
        <div class="button-offre">
            <a href="{{ route('offres.modifier', $offre) }}">Modifier</a>
            <form action="{{ route('offres.supprimer', $offre->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?');">
                @csrf
                @method('DELETE')
                <button id="supprimer" type="submit">Supprimer</button>
            </form>
        </div>
        @endif
    </div>
</div>

@endsection