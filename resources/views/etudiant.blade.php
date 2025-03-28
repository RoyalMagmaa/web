
@extends('layouts.app')

@section('titre','Etudiant')

@section('styles') 
    @vite('resources/css/style-etudiant.css')
@endsection

@section('main')
    <div class="main-section">
        <div class="header-section">
            <h1 id="titre-offre">Gestion des comptes étudiants</h1>
        </div>
        <div class="sub-section">
            <div class="offer-text">
                <h2>Comptes étudiants</h2>
                <a href="create-student.html" class="create-button">Créer un compte</a>
            </div>
            <div class="search-container">
                <div class="search-box">
                    <i class="search-icon">🔍</i>
                    <input id="input-recherche" placeholder="Rechercher un étudiant" type="text">
                </div>
                <select name="status" id="status-select">
                    <option value="">Tous les statuts</option>
                    <option value="En recherche">En recherche</option>
                    <option value="Stage trouvé">Stage trouvé</option>
                    <option value="En attente">En attente</option>
                </select>
            </div>
            <div id="students-container" class="students-grid">
                <!-- Student cards will be inserted here by JavaScript -->
            </div>
            <div id="no-results" class="no-results hidden">
                <p>Aucun étudiant trouvé</p>
            </div>
            <div id="loading" class="loading">
                <div class="spinner"></div>
            </div>
        </div>
@endsection