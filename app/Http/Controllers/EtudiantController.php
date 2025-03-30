<?php

namespace App\Http\Controllers;
use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Statut;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class EtudiantController extends Controller
{
    public function afficher_liste() {
        $roleEtudiant = Role::where('nom_role', 'Etudiant')->first();
        $etudiants = Utilisateur::where('role_id', $roleEtudiant->id)->get();
        return view('etudiants.liste', compact('etudiants')); // Envoyer les données à la vue
    }
    public function afficher($id){
        $etudiant = Utilisateur::with('statut')->findOrFail($id);
        return view('etudiants.focus', compact('etudiant'));
    }
    public function afficher_creer() {
        $statuts = Statut::all(); // Récupère tous les statuts de la table statut
        return view('etudiants.creer', compact('statuts'));
    }
    public function afficher_modifier($id) {
        $etudiant = Utilisateur::with('statut')->findOrFail($id); // Récupérer toutes les etudiants
        return view('etudiants.modifier', compact('etudiant')); // Envoyer les données à la vue
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email',
            'mdp' => 'required|string|min:8',
        ]);

        // Récupère l'utilisateur
        $etudiant = Utilisateur::findOrFail($id);
        $etudiant->nom = $request->input('nom');
        $etudiant->prenom = $request->input('prenom');
        $etudiant->email = $request->input('email');
        $etudiant->mdp = Hash::make($request->input('mdp')); // Correctement hashé
        $etudiant->save();

        return redirect()->route('etudiants.liste')->with('success', 'Etudiant mis à jour avec succès.');
    }


    public function store(Request $request) {
        // Valider les données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'mdp' => 'required|string|min:8',
            'statut_id' => 'required|exists:statuts,id'  // Validation que l'id du statut existe dans la table statuts
        ]);

        // Créer l'utilisateur
        Utilisateur::create([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'mdp' => Hash::make($request->input('mdp')),  // Hash du mot de passe
            'statut_id' => $request->input('statut_id'),
            'role_id' => 1, // Tu devras peut-être changer ça si tu veux associer un rôle précis (par exemple, rôle étudiant)
        ]);

        // Rediriger avec un message
        return redirect()->route('etudiants.liste')->with('success', 'Étudiant créé avec succès.');
    }
}
