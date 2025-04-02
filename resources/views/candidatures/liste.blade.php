@section('titre','wishlist')

@section('styles') 
    @vite('resources/css/style-wishlist.css')
@endsection

<!-- resources/views/wishlist.blade.php -->
@section('main')
<div class="container">
    <h1>Ma Wishlist</h1>

    @if($candidatures->isEmpty())
        <p>Aucune offre dans votre wishlist.</p>
    @else
        <ul>
            @foreach($candidatures as $item)
                <li>
                    <!-- Accède à l'offre liée -->
                    @if($item->offre)
                    
                        <div>
                            <strong>{{ $item->offre->titre }}</strong> - {{ $item->offre->entreprise->nom }}
                        </div>
                    @else
                        <p>Offre introuvable</p>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection