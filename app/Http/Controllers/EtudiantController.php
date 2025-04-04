<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Role;
use App\Models\Statut;
use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class EtudiantController extends Controller
{
    public function afficher_liste(Request $request)
    {
        $roleEtudiant = Role::where('nom_role', 'Etudiant')->first();
        
        $query = Utilisateur::where('role_id', $roleEtudiant->id);

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom', 'LIKE', "%{$search}%")
                ->orWhere('prenom', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        $etudiants = $query->paginate(10); // Pagination pour meilleure lisibilité

        return view('etudiants.liste', compact('etudiants'));
    }

    public function afficher($id)
    {
        $etudiant = Utilisateur::with(['statut'])
            ->withCount(['candidatures', 'wishlist'])
            ->findOrFail($id);

        return view('etudiants.focus', compact('etudiant'));
    }

    public function afficher_creer()
    {
        $statuts = Statut::all(); // Récupère tous les statuts de la table statut
        return view('etudiants.creer', compact('statuts'));
    }
    public function afficher_modifier($id)
    {
        $etudiant = Utilisateur::with('statut')->findOrFail($id); // Récupérer toutes les etudiants
        return view('etudiants.modifier', compact('etudiant')); // Envoyer les données à la vue
    }

    public function update(Request $request, $id)
    {
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


    public function store(Request $request)
    {
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

    public function supprimer($id)
    {
        $etudiant = Utilisateur::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.liste')->with('success', 'Étudiant supprimé avec succès.');
    }

    public function afficher_profil()
    {
        $etudiant = Auth::user(); // Récupère l'utilisateur connecté
        return view('etudiants.profil', compact('etudiant'));
    }

    public function modifier_statut(Request $request)
    {
        // Valider le statut envoyé
        $request->validate([
            'statut' => 'required|string|in:En recherche,En stage',
        ]);
    
        // Récupérer l'utilisateur connecté
        $etudiant = Auth::user();
    
        // Récupérer l'ID du statut correspondant dans la table `statuts`
        $statut = Statut::where('nom_statut', $request->statut)->first();
    
        if ($statut) {
            // Mettre à jour la clé étrangère `statut_id` dans la table `utilisateurs`
            $etudiant->statut_id = $statut->id;
            $etudiant->save();
        }
    
        // Rediriger avec un message de succès
        return redirect()->route('profil')->with('success', 'Statut mis à jour avec succès.');
    }
}
