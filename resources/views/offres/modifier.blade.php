@extends('layouts.app')

@section('titre','Modification d\'offre')

@section('main')

    <h1>Modifier {{ $offre->entreprise->nom }}</h1>
    <form action="{{ route('offres.update', $offre->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <input type="text" name="titre" value="{{ $offre->titre }}" required>
        <textarea name="description" required>{{ $offre->description }}</textarea>
        <input type="date" name="date_debut" value="{{ $offre->date_debut }}" required>
        <input type="date" name="date_fin" value="{{ $offre->date_fin }}" required>
        
        <label for="entreprise">Entreprise :</label>
        <input type="text" name="entreprise_nom" value="{{ $offre->entreprise->nom ?? '' }}" required>
        <input type="number" name="salaire" value="{{ $offre->titre }}" required>
    
        <button type="submit">Mettre à jour</button>
    </form>
@endsection



