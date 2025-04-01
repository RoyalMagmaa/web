<?php

namespace Database\Factories;

use App\Models\Entreprise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entreprise>
 */
class EntrepriseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Entreprise::class;
    
    public function definition(): array
    {
        return [
            'nom' => $this->faker->company,
            'description' => collect($this->faker->paragraphs(3))->join(' '),
            'email' => $this->faker->companyEmail,
            'telephone' => $this->faker->phoneNumber,
            'evaluation' => $this->faker->randomFloat(2, 0, 5),
        ];
    }
}
