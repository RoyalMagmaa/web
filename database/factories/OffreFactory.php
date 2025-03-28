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
        return [
            'titre' => $this->faker->jobTitle,
            'description' => $this->faker->sentence(10),
            'salaire' => $this->faker->randomFloat(2, 1500, 5000),
            'date_debut' => $this->faker->date,
            'date_fin' => $this->faker->optional()->date,
            'entreprise_id' => Entreprise::factory(),
        ];
    }
}
