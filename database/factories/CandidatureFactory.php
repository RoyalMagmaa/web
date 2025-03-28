<?php

namespace Database\Factories;

use App\Models\Candidature;
use App\Models\Utilisateur;
use App\Models\Offre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidature>
 */
class CandidatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_candid' => $this->faker->date,
            'lettre_motiv' => $this->faker->paragraph,
            'cv' => 'cv_example.pdf',
            'utilisateur_id' => Utilisateur::factory(),
            'offre_id' => Offre::factory(),
        ];
    }
}
