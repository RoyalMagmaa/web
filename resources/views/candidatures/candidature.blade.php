@extends('layouts.app')

@section('titre','Offre')

@section('styles') 
    @vite('resources/css/style-candidature.css')
@endsection

@section('main')

<div class="container">
    <h1>Postuler à l'offre : {{ $offre->titre }}</h1>

    <form action="{{ route('candidatures.store', $offre->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="lettre_motiv" class="form-label">Lettre de motivation</label>
            <textarea name="lettre_motiv" id="lettre_motiv" class="form-control" rows="6" required></textarea>
            @error('lettre_motiv')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cv" class="form-label">CV (format PDF)</label>
            <input type="file" name="cv" id="cv" class="form-control" accept=".pdf" required>
            @error('cv')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Envoyer ma candidature</button>
    </form>
</div>
@endsection