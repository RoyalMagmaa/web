@extends('layouts.app')

@section('titre','Création de comptes étudiants')

@section('styles') 
    @vite('resources/css/style-creer.css')
@endsection

@section('main')
    <div>
    <h1>Créer un compte étudiant</h1>
    <form action="{{ route('etudiants.store') }}" method="POST">
        @csrf
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prenom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="mdp" placeholder="Mot de passe" required>
        <select name="statut_id" id="statut_id" required>
            @foreach ($statuts as $statut)
                <option value="{{ $statut->id }}">{{ $statut->nom_statut }}</option>
            @endforeach
        </select>
        <button type="submit">Créer</button>
    </form>
        @if ($errors->any())
            <div>
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection