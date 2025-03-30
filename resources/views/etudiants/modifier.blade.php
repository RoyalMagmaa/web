@extends('layouts.app')

@section('titre','Modification de comptes étudiants')

@section('main')

    <h1>Modifier {{ $etudiant->prenom }} {{ $etudiant->nom }}</h1>
    <form action="{{ route('etudiants.update', ['id' => $etudiant->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nom" value="{{ $etudiant->nom }}" required>
        <input type="text" name="prenom" value="{{ $etudiant->prenom }}" required>
        <input type="email" name="email" value="{{ $etudiant->email }}" required>
        <input type="text" name="mdp" value="{{ $etudiant->mdp }}" required>
        <button type="submit">Mettre à jour</button>
        @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
        </form>
@endsection