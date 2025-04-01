<?php

namespace Database\Factories;

use App\Models\Offre;
use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offre>
 */
class OffreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateDebut = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $dateFin = $this->faker->optional()->dateTimeBetween($dateDebut, '+6 months');
        
        return [
            'titre' => $this->faker->jobTitle,
            'description' => collect($this->faker->paragraphs(4))->join(' '),
            'salaire' => $this->faker->randomFloat(2, 1500, 5000),
            'date_debut' => $dateDebut,
            'date_fin' => $dateFin,
            'entreprise_id' => Entreprise::factory(),
        ];
    }
}
