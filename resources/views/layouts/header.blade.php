
<nav>
    <div class="navbar" id="logo">
        <img src="{{ asset('images/logo.png') }}">
    </div>

    @if(Auth::user()->role->nom_role === 'Admin')
    <div class="navbar">
        <a href="{{ route('entreprises.liste') }}">Entreprises</a>
        <a href="{{ route('etudiants.liste') }}">Etudiants</a>
        <a href="{{ route('offres.liste') }}">Offres</a>
        <a href="{{ route('pilotes.liste') }}">Pilotes</a>
    </div>
    @elseif(Auth::user()->role->nom_role === 'Pilote')
    <div class="navbar">
        <a href="{{ route('entreprises.liste') }}">Entreprises</a>
        <a href="{{ route('etudiants.liste') }}">Etudiants</a>
        <a href="{{ route('offres.liste') }}">Offres</a>
    </div>
    @elseif(Auth::user()->role->nom_role === 'Etudiant')
    <div class="navbar">
        <a href="{{ route('offres.liste') }}">Offres</a>
        <a href="{{ route('entreprises.liste') }}">Entreprises</a>
    </div>
    @endif

    <div class="navbar" id="profil-menu">
        <img src="{{ asset('images/utilisateur.png') }}" id="profil-icon" alt="Profil">
        <div id="dropdown-menu">
            @if(Auth::user()->role->nom_role === 'Etudiant')
                <a href="{{ route('wishlist') }}">Wishlist</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Déconnexion</button>
            </form>
        </div>
    </div>
</nav>