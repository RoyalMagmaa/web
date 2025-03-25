<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Entreprise; // Assure-toi que c'est bien importé !

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreprise>
 */

class EntrepriseFactory extends Factory
{
    protected $model = Entreprise::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->company, // Génère un nom d'entreprise
            'description' => $this->faker->catchPhrase, // Génère une phrase aléatoire
            'email' => $this->faker->unique()->companyEmail, // Génère un email unique
            'telephone' => $this->faker->phoneNumber, // Génère un numéro de téléphone
            'evaluation' => $this->faker->randomFloat(2, 1, 5), // Note entre 1.00 et 5.00
        ];
    }
}
