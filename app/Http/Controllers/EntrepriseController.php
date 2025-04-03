<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use App\Models\Evaluer;
use Illuminate\Support\Facades\Auth;

class EntrepriseController extends Controller
{
    public function afficher($id)
    {
        $entreprise = Entreprise::withCount('offres')
            ->with(['offres' => function($query) {
                $query->withCount('candidatures');
            }])
            ->findOrFail($id);

        // Calcul du nombre total de candidatures sur toutes les offres de l'entreprise
        $totalCandidatures = $entreprise->offres->sum('candidatures_count');

        $moyenneNote = Evaluer::where('entreprise_id', $id)->avg('note');
        $moyenneNote = $moyenneNote ? round($moyenneNote, 2) : 'Aucune note';
    
        return view('entreprises.focus', compact('entreprise', 'totalCandidatures', 'moyenneNote'));
    }

    public function afficher_liste(Request $request)
    {
        $query = Entreprise::query();

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('nom', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%");
        }
    
        $entreprises = $query->paginate(10); // Pagination pour une meilleure lisibilité
        return view('entreprises.liste', compact('entreprises')); // Envoyer les données à la vue
    }

    public function afficher_creer()
    {
        return view('entreprises.creer'); // Envoyer les données à la vue
    }

    public function afficher_modifier($id)
    {
        $entreprise = Entreprise::findOrFail($id); // Récupérer toutes les entreprises
        return view('entreprises.modifier', compact('entreprise')); // Envoyer les données à la vue
    }

    public function update(Request $request, $id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->nom = $request->input('nom');
        $entreprise->description = $request->input('adresse');
        $entreprise->email = $request->input('email');
        $entreprise->telephone = $request->input('telephone');
        $entreprise->save();

        return redirect()->route('entreprises.liste')->with('success', 'Entreprise mise à jour avec succès.');
    }

    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'nom' => 'required|max:50',
            'description' => 'required|max:50',
            'email' => 'required|email|max:50',
            'telephone' => 'required|max:50',
        ]);

        // Créer l'entreprise
        Entreprise::create($request->all());

        // Rediriger avec un message
        return redirect()->route('entreprises.liste')->with('success', 'Entreprise créée avec succès.');
    }

    public function supprimer($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $entreprise->delete();

        return redirect()->route('entreprises.liste')->with('success', 'Entreprise supprimée avec succès.');
    }


    public function evaluer(Request $request, $id)
    {
        $request->validate([
            'note' => 'required|integer|min:1|max:5',
        ]);

        $utilisateurId = Auth::id();

        // Vérifie si l'utilisateur a déjà évalué cette entreprise
        $evaluationExistante = Evaluer::where('utilisateur_id', $utilisateurId)
                                         ->where('entreprise_id', $id)
                                         ->first();

        if ($evaluationExistante) {
            $evaluationExistante->note = $request->note;
            $evaluationExistante->save();
        } else {
            Evaluer::create([
                'utilisateur_id' => $utilisateurId,
                'entreprise_id' => $id,
                'note' => $request->note,
            ]);
        }

        return response()->json(['message' => 'Évaluation enregistrée avec succès !']);
    }
}

        