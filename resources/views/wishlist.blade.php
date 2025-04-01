
@extends('layouts.app')

@section('titre','wishlist')

@section('styles') 
    @vite('resources/css/style-wishlist.css')
@endsection

<!-- resources/views/wishlist.blade.php -->
@section('main')
<div class=container>
    <h1>Ma Wishlist</h1>

    @if($wishlist->isEmpty())
        <p>Aucune offre dans votre wishlist.</p>
    @else
        <ul>
            @foreach($wishlist as $item)
                <li>
                    <!-- Accède à l'offre liée -->
                    @if($item->offre)
                        <div>
                            <strong>{{ $item->offre->titre }}</strong> - {{ $item->offre->entreprise->nom }}
                        </div>
                        <form action="{{ route('wishlist.supprimer', ['id' => $item->offre_id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Retirer de la Wishlist</button>
                        </form>
                    @else
                        <p>Offre introuvable</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection