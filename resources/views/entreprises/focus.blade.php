@extends('layouts.app')

@section('titre','Entreprise')

@section('styles')
@vite('resources/css/style-focus.css')
@vite('resources/js/rating.js')
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
            <div class="section">
                <h2>Évaluer cette entreprise</h2>
                <div class="rating">
                    <span class="star" data-index="1">&#9733;</span>
                    <span class="star" data-index="2">&#9733;</span>
                    <span class="star" data-index="3">&#9733;</span>
                    <span class="star" data-index="4">&#9733;</span>
                    <span class="star" data-index="5">&#9733;</span>
                </div>
                <p id="votre-note">Votre note : 0/5</p>

                <button id="submit-rating">Valider</button>
            </div>

        </div>
    </div>
</div>


@endsection