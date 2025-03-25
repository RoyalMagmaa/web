<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;

class EntrepriseController extends Controller
{
    public function index() {
        $entreprises = Entreprise::all(); // Récupérer toutes les entreprises
        return view('gestionEntreprises', compact('entreprises')); // Envoyer les données à la vue
    }

    public function store(Request $request)
    {
        // Valider les données
        $request->validate([
            'nom' => 'required|max:50',
            'description' => 'required|max:50',
            'email' => 'required|email|max:50',
            'telephone' => 'required|max:50',
            'evaluation' => 'nullable|numeric|min:0|max:5'
        ]);

        // Créer l'entreprise
        Entreprise::create($request->all());

        // Rediriger avec un message
        return redirect('/gestionEntreprises')->with('success', 'Entreprise ajoutée avec succès !');
    }
}
