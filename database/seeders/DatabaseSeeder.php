<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Entreprise;
use App\Models\Offre;
use App\Models\Utilisateur;
use App\Models\Candidature;
use App\Models\Wishlist;
use App\Models\Evaluer;
use App\Models\Role;
use App\Models\Statut;
use App\Models\Competence;
use App\Models\Requiert;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('fr_FR');

        // Insérer les rôles
        $roles = ['Etudiant', 'Pilote', 'Admin'];
        foreach ($roles as $role) {
            Role::create(['nom_role' => $role]);
        }

        // Insérer les statuts
        $statuts = ['En recherche', 'En stage'];
        foreach ($statuts as $statut) {
            Statut::create(['nom_statut' => $statut]);
        }

        // Insérer des compétences aléatoires
        Competence::factory(10)->create();

        // Création de 10 entreprises
        Entreprise::factory(10)->create()->each(function ($entreprise) {
            Offre::factory(rand(2, 5))->create(['entreprise_id' => $entreprise->id])->each(function ($offre) {
                // Associer des compétences aux offres
                $competences = Competence::inRandomOrder()->limit(rand(1, 3))->pluck('id');
                foreach ($competences as $competence) {
                    Requiert::create([
                        'offre_id' => $offre->id,
                        'competence_id' => $competence
                    ]);
                }
            });
        });

        Utilisateur::factory(40)->create()->each(function ($utilisateur) use ($faker) {
            // Associer un rôle aléatoire
            $role = Role::inRandomOrder()->first();
            $utilisateur->role_id = $role->id;
            $utilisateur->save();
        
            // Si le rôle est Etudiant, lui donner un statut
            if ($role->nom_role === 'Etudiant') {
                $statut = Statut::inRandomOrder()->first();
                $utilisateur->statut_id = $statut->id;
                $utilisateur->save();
        
                // 🔑 Générer des candidatures uniquement pour les Etudiants
                $offres = Offre::inRandomOrder()->limit(rand(0, 3))->pluck('id');
                foreach ($offres as $offre) {
                    Candidature::factory()->create([
                        'utilisateur_id' => $utilisateur->id,
                        'offre_id' => $offre
                    ]);
                }
        
                // 🔑 Ajouter des offres à la wishlist uniquement pour les Etudiants
                $wishlistOffres = Offre::inRandomOrder()->limit(rand(1, 5))->pluck('id');
                foreach ($wishlistOffres as $offre) {
                    Wishlist::factory()->create([
                        'utilisateur_id' => $utilisateur->id,
                        'offre_id' => $offre
                    ]);
                }
        
                // 🔑 Évaluation des entreprises uniquement pour les Etudiants
                $entreprises = Entreprise::inRandomOrder()->limit(rand(1, 3))->pluck('id');
                foreach ($entreprises as $entreprise) {
                    Evaluer::factory()->create([
                        'utilisateur_id' => $utilisateur->id,
                        'entreprise_id' => $entreprise,
                    ]);
                }
            }
        });
    }
}