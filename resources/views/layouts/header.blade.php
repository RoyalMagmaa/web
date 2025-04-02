<nav>
    <div class="navbar" id="logo">
        <img src="{{ asset('images/logo.png') }}">
    </div>

    <button id="burger-menu" class="burger-menu">
        ☰
    </button>

    <div class="navbar menu" id="main-menu">
        @if(Auth::user()->role->nom_role === 'Admin')
        <a href="{{ route('offres.liste') }}">Offres</a>
        <a href="{{ route('entreprises.liste') }}">Entreprises</a>
        <a href="{{ route('etudiants.liste') }}">Etudiants</a>
        <a href="{{ route('pilotes.liste') }}">Pilotes</a>
        @elseif(Auth::user()->role->nom_role === 'Pilote')
        <a href="{{ route('offres.liste') }}">Offres</a>
        <a href="{{ route('entreprises.liste') }}">Entreprises</a>
        <a href="{{ route('etudiants.liste') }}">Etudiants</a>
        @elseif(Auth::user()->role->nom_role === 'Etudiant')
        <a href="{{ route('offres.liste') }}">Offres</a>
        <a href="{{ route('entreprises.liste') }}">Entreprises</a>
        @endif
    </div>

    <div class="navbar" id="profil-menu">
        <img src="{{ asset('images/utilisateur.png') }}" id="profil-icon" alt="Profil">
        <div id="dropdown-menu">
            @if(Auth::user()->role->nom_role === 'Etudiant')
                <a id="drop-menu-b1" href="{{ route('profil') }}">Mon Profil</a>
                <a id="drop-menu-b2" href="{{ route('wishlist') }}">Wishlist</a>
            @endif
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button id="drop-menu-b3" type="submit">Déconnexion</button>
            </form>
        </div>
    </div>
</nav>