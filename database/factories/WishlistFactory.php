<?php

namespace Database\Factories;

use App\Models\Wishlist;
use App\Models\Utilisateur;
use App\Models\Offre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wishlist>
 */
class WishlistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'offre_id' => Offre::factory(),
            'utilisateur_id' => Utilisateur::factory(),
        ];
    }
}
