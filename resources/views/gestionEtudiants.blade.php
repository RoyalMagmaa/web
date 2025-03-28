
@extends('layouts.app')

@section('titre','Gesetion Etudiant')

@section('styles') 
    @vite('resources/css/style-etudiant.css')
@endsection

@section('main')
    <div class="main-section">
        <div class="header-section">
            <h1 id="titre-offre">Modifier un compte étudiant</h1>
        </div>
        <div class="sub-section">
            <div class="form-container">
                <h2 class="form-title">Informations de l'étudiant</h2>
                <form id="edit-student-form">
                    <input type="hidden" id="studentId" name="studentId">
                    <div class="form-group">
                        <label for="firstName" class="form-label">Prénom</label>
                        <input type="text" id="firstName" name="firstName" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="lastName" class="form-label">Nom</label>
                        <input type="text" id="lastName" name="lastName" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label for="status" class="form-label">Statut</label>
                        <select id="status" name="status" class="form-select" required>
                            <option value="En recherche">En recherche</option>
                            <option value="Stage trouvé">Stage trouvé</option>
                            <option value="En attente">En attente</option>
                        </select>
                    </div>
                    <div class="form-buttons">
                        <a href="etudiants.html" class="btn btn-secondary">Annuler</a>
                        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection