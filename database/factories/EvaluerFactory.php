<?php

namespace Database\Factories;

use App\Models\Evaluer;
use App\Models\Utilisateur;
use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluer>
 */
class EvaluerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'entreprise_id' => Entreprise::factory(),
            'utilisateur_id' => Utilisateur::factory(),
            'note' => $this->faker->randomFloat(1, 1, 5),
        ];
    }
}
