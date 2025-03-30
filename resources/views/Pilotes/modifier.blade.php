@extends('layouts.app')

@section('titre','Modification de comptes étudiants')

@section('styles') 
    @vite('resources/css/style-creer.css')
@endsection

@section('main')
<div>
    <h1>Modifier {{ $pilote->prenom }} {{ $pilote->nom }}</h1>
    <form action="{{ route('pilotes.update', ['id' => $pilote->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="nom" value="{{ $pilote->nom }}" required>
        <input type="text" name="prenom" value="{{ $pilote->prenom }}" required>
        <input type="email" name="email" value="{{ $pilote->email }}" required>
        <input type="text" name="mdp" placeholder="Nouveau mot de passe" required>
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
