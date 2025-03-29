<?php

namespace App\Http\Controllers;
use App\Models\Offre;
use Illuminate\Http\Request;

class OffreController extends Controller
{
    public function afficher_liste() {
        $offres = Offre::all(); // Récupérer toutes les entreprises
        return view('offres', compact('offres')); // Envoyer les données à la vue
    }

    public function afficher_offre($id){
        $offre = Offre::with('entreprise')->findOrFail($id);
        return view('focusOffre', compact('offre'));
    }
}
