@extends('layouts.app')

@section('titre','Modification d\'entreprise')

@section('main')

    <h1>Modifier {{ $entreprise->nom }}</h1>
    <form action="{{ route('entreprises.update', ['id' => $entreprise->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nom" value="{{ $entreprise->nom }}" required>
        <input type="text" name="adresse" value="{{ $entreprise->description }}" required>
        <input type="email" name="email" value="{{ $entreprise->email }}" required>
        <input type="text" name="telephone" value="{{ $entreprise->telephone }}" required>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection