@extends('layouts.app')

@section('titre','Entreprise')

@section('styles') 
    @vite('resources/css/style-focus.css')
@endsection

@section('main')

<div class="container">
    <div class="focus-entreprise">
        <div class="header">
            <h1>{{ $entreprise->nom }}</h1>
            <p class="evaluation">⭐ {{ $entreprise->evaluation }} / 5</p>
        </div>

        <div class="content">
            <div class="section">
                <h2>Description</h2>
                <p>{{ $entreprise->description }}</p>
            </div>

            <div class="section">
                <h2>Contact</h2>
                <p><strong>Email :</strong> {{ $entreprise->email }}</p>
                <p><strong>Téléphone :</strong> {{ $entreprise->telephone }}</p>
            </div>
        </div>
    </div>
</div>

@endsection