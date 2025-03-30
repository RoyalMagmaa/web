@extends('layouts.app')

@section('titre','Création d\'offres')

@section('styles') 
    @vite('resources/css/style-creer.css')
@endsection

@section('main')
    <div>
    <h1>Créer une offre</h1>
    <form action="{{ route('offres.store') }}" method="POST">
        @csrf
        <input type="text" name="titre" placeholder="titre" required>
        <input type="text" name="description" placeholder="description" required>
        <input type="text" name="entreprise_nom" placeholder="Entreprise" required>
        <input type="date" name="date_debut" placeholder="Date de début" required>
        <input type="date" name="date_fin" placeholder="Date de fin" required>
        <input type="number" name="salaire" placeholder="salaire" required>
        <button type="submit">Créer</button>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </form>
    </div>
@endsection