<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use App\Models\Entreprise;
use Illuminate\Http\Request;


class OffreController extends Controller
{
    public function afficher_liste(Request $request)
    {
        $query = Offre::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('titre', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }
    
        $offres = $query->paginate(10); // Pagination pour une meilleure lisibilité
        return view('offres.liste', compact('offres')); // Envoyer les données à la vue
    }

    public function afficher($id)
    {
        $offre = Offre::with(['entreprise'])->withCount('candidatures')->findOrFail($id);
        return view('offres.focus', compact('offre'));
    }
    public function afficher_creer()
    {
        return view('offres.creer'); // Envoyer les données à la vue
    }
    public function afficher_modifier($id)
    {
        $offre = Offre::with('entreprise')->findOrFail($id); // Récupérer toutes les offres
        return view('offres.modifier', compact('offre')); // Envoyer les données à la vue
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'entreprise_nom' => 'required|string',
            'salaire' => 'required|numeric'
        ]);

        // Cherche l'entreprise par son nom
        $entreprise = Entreprise::where('nom', $request->input('entreprise_nom'))->first();

        if (!$entreprise) {
            // Redirige avec une erreur si l'entreprise n'existe pas
            return redirect()->back()->withErrors(['entreprise_nom' => 'L’entreprise spécifiée n’existe pas.']);
        }

        $offre = Offre::findOrFail($id);
        $offre->titre = $request->input('titre');
        $offre->description = $request->input('description');
        $offre->date_debut = $request->input('date_debut');
        $offre->date_fin = $request->input('date_fin');
        $offre->salaire = $request->input('salaire');
        $offre->entreprise_id = $entreprise->id;  // Associe l'offre à l'entreprise trouvée
        $offre->save();

        return redirect()->route('offres.liste')->with('success', 'Offre mise à jour avec succès.');
    }


    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'entreprise_nom' => 'required|string',
            'salaire' => 'required|numeric',
        ]);

        // Cherche l'entreprise par son nom
        $entreprise = Entreprise::where('nom', $request->input('entreprise_nom'))->first();

        if (!$entreprise) {
            // Redirige avec une erreur si l'entreprise n'existe pas
            return redirect()->back()->withErrors(['entreprise_nom' => 'L’entreprise spécifiée n’existe pas.']);
        }

        // Créer l'offre
        Offre::create([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'salaire' => $request->input('salaire'),
            'entreprise_id' => $entreprise->id, // Associe l'offre à l'entreprise trouvée
        ]);

        // Rediriger avec un message
        return redirect()->route('offres.liste')->with('success', 'Offre créée avec succès.');
    }

    public function supprimer($id)
    {
        $offre = Offre::findOrFail($id);
        $offre->delete();

        return redirect()->route('offres.liste')->with('success', 'Offre supprimée avec succès.');
    }
}
