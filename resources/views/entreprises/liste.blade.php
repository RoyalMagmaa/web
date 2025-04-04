@extends('layouts.app')

@section('titre','Entreprises')

@section('styles')
@vite('resources/css/style-liste.css')
@endsection

@section('main')

<div class="main-section">
    <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})">
        <h1 id="titre-offre">Choisissez une entreprise</h1>
    </div>
    <div class="sub-section">
        <div class="haut-liste">
            <div>
                <h2>Liste des entreprises</h2>
            </div>
            @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
            <a id="boutonCreer" href="{{ route('entreprises.creer') }}">Ajouter une entreprise</a>
            @endif
        </div>
        <form action="{{ route('entreprises.liste') }}" id="login-form" method="GET" class="mb-4">
            <input id="input-recherche" type="text" name="search" placeholder="Rechercher une offre..." value="{{ request()->search ?? '' }}">
            <button type="submit" id="sub-button">Rechercher</button>
        </form>
        @foreach ($entreprises as $entreprise)
        <div class="element-liste">
            <p>{{ $entreprise->nom }}</p>
            <div class="boutons-element">
                <a href="{{ route('entreprises.focus', ['id' => $entreprise->id]) }}">Consulter</a>
                @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
                <a href="{{ route('entreprises.modifier', $entreprise) }}">Modifier</a>
                <form action="{{ route('entreprises.supprimer', $entreprise->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette entreprise ?');">
                    @csrf
                    @method('DELETE')
                    <button id="supprimer" type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
        <div class="pagination">
            {{ $entreprises->links() }}
        </div>
    </div>
@endsection