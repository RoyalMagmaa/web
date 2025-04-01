@extends('layouts.app')

@section('titre','Pilotes')

@section('styles')
@vite('resources/css/style-liste.css')
@endsection

@section('main')

<div class="main-section">
    <div class="header-section" style="background-image: url({{asset('images/backgroundOffre.png')}})">
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
        <form action="{{ route('Pilotes.liste') }}" id="login-form" method="GET" class="mb-4">
            <input id="input-recherche" type="text" name="search" placeholder="Rechercher une offre..." value="{{ request()->search ?? '' }}">
            <button type="submit">Rechercher</button>
        </form>
        @foreach ($pilotes as $pilote)
        <div class="element-liste">
            <p>{{ $pilote->prenom}} {{ $pilote->nom }} </p>
            <div class="boutons-element">
                <a href="{{ route('pilotes.focus', ['id' => $pilote->id]) }}">Consulter</a>
                @if(Auth::user()->role->nom_role === 'Admin' || Auth::user()->role->nom_role === 'Pilote')
                <a href="{{ route('pilotes.modifier', $pilote) }}">Modifier</a>
                <form action="{{ route('pilotes.supprimer', $pilote->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cette entreprise ?');">
                    @csrf
                    @method('DELETE')
                    <button id="supprimer" type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
        <div class="pagination">
            {{ $pilotes->links() }}
    </div>
    @endsection