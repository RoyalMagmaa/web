@extends('layouts.app')

@section('titre','Création d\'entreprise')

@section('styles') 
    @vite('resources/css/style-creer.css')
@endsection

@section('main')
    <div>
    <h1>Créer une entreprise</h1>
    <form action="{{ route('entreprises.store') }}" method="POST">
        @csrf
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="description" placeholder="description" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="telephone" placeholder="Téléphone" required>
        <button type="submit">Créer</button>
    </form>
    </div>
@endsection