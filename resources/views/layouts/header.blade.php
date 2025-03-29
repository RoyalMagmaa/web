
<nav>
    <div class="navbar" id="logo">
        <img src="{{ asset('images/logo.png') }}">
    </div>
    @if(Auth::user()->role->nom_role === 'Admin')
    <div class="navbar">
        <a href="{{ route('gestionEntreprises') }}">Entreprises</a>
        <a href="{{ route('gestionEtudiants') }}">Etudiants</a>
        <a href="{{ route('gestionOffres') }}">Offres</a>
        <a href="{{ route('gestionPilotes') }}">Pilotes</a>
    </div>
    @elseif(Auth::user()->role->nom_role === 'Pilote')
    <div class="navbar">
        <a href="{{ route('gestionEntreprises') }}">Entreprises</a>
        <a href="{{ route('gestionEtudiants') }}">Etudiants</a>
        <a href="{{ route('gestionOffres') }}">Offres</a>
    </div>
    @elseif(Auth::user()->role->nom_role === 'Etudiant')
    <div class="navbar">
        <a href="{{ route('offres') }}">Offres</a>
        <a href="{{ route('entreprises') }}">Entreprises</a>
    </div>
    @endif

    <div class="navbar" id="profil-menu">
        <img src="{{ asset('images/utilisateur.png') }}">
    </div>
    <form action="{{ route('logout') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <button type="submit">Deconnexion</button>
    </form>
</nav>