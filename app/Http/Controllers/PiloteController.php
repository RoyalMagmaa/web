<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Statut;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PiloteController extends Controller
{
    public function afficher_liste() {
        $rolePilote = Role::where('nom_role', 'Pilote')->first();
        $pilotes = Utilisateur::where('role_id', $rolePilote->id)->get();
        return view('pilotes.liste', compact('pilotes')); // Envoyer les données à la vue
    }
    public function afficher($id){
        $pilote = Utilisateur::findOrFail($id);
        return view('pilotes.focus', compact('pilote'));
    }
    public function afficher_creer() {
        $statuts = Statut::all(); // Récupère tous les statuts de la table statut
        return view('pilotes.creer', compact('statuts'));
    }
    public function afficher_modifier($id) {
        $pilote = Utilisateur::findOrFail($id); // Récupérer toutes les pilotes
        return view('pilotes.modifier', compact('pilote')); // Envoyer les données à la vue
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'mdp' => 'required|string|min:8',
        ]);

        // Récupère l'utilisateur
        $pilote = Utilisateur::findOrFail($id);
        $pilote->nom = $request->input('nom');
        $pilote->prenom = $request->input('prenom');
        $pilote->email = $request->input('email');
        $pilote->mdp = Hash::make($request->input('mdp')); // Correctement hashé
        $pilote->save();

        return redirect()->route('pilotes.liste')->with('success', 'pilote mis à jour avec succès.');
    }


    public function store(Request $request) {
        // Valider les données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'mdp' => 'required|string|min:8',
        ]);

        // Créer l'utilisateur
        Utilisateur::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'mdp' => Hash::make($request->input('mdp')),  // Hash du mot de passe
            'role_id' => 2,
        ]);

        // Rediriger avec un message
        return redirect()->route('pilotes.liste')->with('success', 'Étudiant créé avec succès.');
    }

    public function supprimer($id)
    {
        $etudiant = Utilisateur::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.liste')->with('success', 'Étudiant supprimé avec succès.');
    }
}