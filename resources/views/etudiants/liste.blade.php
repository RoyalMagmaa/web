@extends('layouts.app')

@section('titre','Etudiants')

@section('styles')
@vite('resources/css/style-liste.css')
@endsection

@section('main')

<div class="main-section">
    <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})">
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
        <form action="{{ route('etudiants.liste') }}" id="login-form" method="GET" class="mb-4">
            <input id="input-recherche" type="text" name="search" placeholder="Rechercher une offre..." value="{{ request()->search ?? '' }}">
            <button type="submit">Rechercher</button>
        </form>
        @foreach ($etudiants as $etudiant)
        <div class="element-liste">
            <p>{{ $etudiant->prenom}} {{ $etudiant->nom }} </p>
            <div class="boutons-element">
                <a href="{{ route('etudiants.focus', ['id' => $etudiant->id]) }}">Consulter</a>

                @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
                <a href="{{ route('etudiants.modifier', $etudiant) }}">Modifier</a>

                <form action="{{ route('etudiants.supprimer', $etudiant->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette entreprise ?');">
                    @csrf
                    @method('DELETE')
                    <button id="supprimer" type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
        <div class="pagination">
            {{ $etudiants->links() }}
        </div>
    </div>
    @endsection