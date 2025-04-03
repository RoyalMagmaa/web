@extends('layouts.app')

@section('titre','Modification d\'offre')

@section('styles') 
    @vite('resources/css/style-creer.css')
@endsection

@section('main')
<div>
    <h1>Modifier {{ $offre->entreprise->nom }}</h1>
    <form action="{{ route('offres.update', $offre->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <input type="text" name="titre" value="{{ $offre->titre }}" required>
        <input type="text" name="description" value="{{ $offre->description }}" required>
        <input type="date" name="date_debut" value="{{ $offre->date_debut }}" required>
        <input type="date" name="date_fin" value="{{ $offre->date_fin }}" required>
        <input type="text" name="entreprise_nom" value="{{ $offre->entreprise->nom ?? '' }}" required>
        <input type="number" name="salaire" value="{{ $offre->salaire }}" required>
    
        <button type="submit">Mettre à jour</button>
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



