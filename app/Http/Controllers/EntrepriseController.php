<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    public function afficher($id){
        $entreprise = Entreprise::findOrFail($id);
        return view('entreprises.focus', compact('entreprise'));
    }

    public function afficher_liste() {
        $entreprises = Entreprise::all(); // Récupérer toutes les entreprises
        return view('entreprises.liste', compact('entreprises')); // Envoyer les données à la vue
    }

    public function afficher_creer() {
        return view('entreprises.creer'); // Envoyer les données à la vue
    }

    public function afficher_modifier($id) {
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
}
