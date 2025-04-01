@extends('layouts.app')

@section('titre','Accueil')

@section('styles')
@vite('resources/css/style-liste.css')
@endsection

@section('main')
<div class="main-section">
    <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})">
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
        <form action="{{ route('offres.liste') }}" id="login-form" method="GET" class="mb-4">
            <input id="input-recherche" type="text" name="search" placeholder="Rechercher une offre..." value="{{ request()->search ?? '' }}">
            <button type="submit">Rechercher</button>
        </form>
        @foreach ($offres as $offre)
        <div class="element-liste">
            <p>{{ $offre->titre }}</p>
            <p>{{ $offre->entreprise->nom }}</p>
            <div class="boutons-element">
                <a href="{{ route('offres.focus', ['id' => $offre->id]) }}">Consulter</a>
                @if(Auth::user()->role->nom_role === 'Etudiant')
                <form action="{{ route('wishlist.ajouter', ['offre_id' => $offre->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Ajouter à la wishlist</button>
                </form>
                @endif
                @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
                <a href="{{ route('offres.modifier', $offre) }}">Modifier</a>
                <form action="{{ route('offres.supprimer', $offre->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette offre ?');">
                    @csrf
                    @method('DELETE')
                    <button id="supprimer" type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
        <div class="pagination">
            {{ $offres->links() }}
        </div>
    </div>
    @endsection