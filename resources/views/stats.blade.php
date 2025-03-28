@extends('layouts.app')

@section('titre','Statistiques')
@section('styles')
    @vite('resources/css/style-etudiant.css')
@endsection

@section('main')
    <div class="main-section">
        <div class="header-section">
            <h1 id="titre-offre">Statistiques étudiant</h1>
        </div>
        <div class="sub-section">
            <div id="student-stats-container">
                <!-- Student stats will be inserted here by JavaScript -->
                <div class="loading">
                    <div class="spinner"></div>
                </div>
            </div>
            <div class="form-buttons">
                <a href="{{ route('etudiant') }}" class="btn btn-secondary">Retour à la liste</a>
            </div>
        </div>
    </div>
    @endsection