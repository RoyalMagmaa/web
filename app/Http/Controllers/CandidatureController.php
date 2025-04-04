<?php
namespace App\Http\Controllers;

use App\Models\Candidature;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidatureController extends Controller
{
    public function afficher_liste()
    {
        // Récupère l'utilisateur connecté
        $utilisateurId = Auth::id();

        // Récupère toutes les candidatures de cet utilisateur avec leurs relations utilisateur et offre
        $candidatures = Candidature::with(['utilisateur', 'offre'])
                                ->where('utilisateur_id', $utilisateurId)
                                ->get();
        return view('candidatures.liste', compact('candidatures'));
    }

    public function afficher($offre_id)
    {
        $offre = Offre::findOrFail($offre_id);
        return view('candidatures.candidature', compact('offre'));
    }

    public function store(Request $request, $offre_id)
    {
        $request->validate([
            'lettre_motiv' => 'required|string|max:2000',
            'cv' => 'required|mimes:pdf|max:2048', // Le CV doit être un fichier PDF de max 2MB
        ]);

        $cvPath = $request->file('cv')->store('cvs', 'public'); // On stocke le CV dans le dossier public/cvs

        Candidature::create([
            'date_candid' => now(),
            'lettre_motiv' => $request->lettre_motiv,
            'cv' => $cvPath,
            'utilisateur_id' => Auth::id(),
            'offre_id' => $offre_id,
        ]);

        return redirect()->route('offres.focus', $offre_id)->with('success', 'Votre candidature a été envoyée avec succès.');
    }
}