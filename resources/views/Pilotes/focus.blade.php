@extends('layouts.app')

@section('titre','Pilote')

@section('styles') 
    @vite('resources/css/style-focus.css')
@endsection

@section('main')

<div class="container">
    <div class="focus-offre">
        <div class="header">
            <h1>{{ $pilote->prenom }} {{ $pilote->nom }}</h1>
        </div>

        <div class="content">
            <div class="section">
                <h2>Identifiants</h2>
                <p>{{ $pilote->email }}</p>
            </div>

            <div class="section">
                <h2>Statistiques</h2>
            </div>
        </div>
    </div>
</div>

@endsection