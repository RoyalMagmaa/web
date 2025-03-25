<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Entreprise;

class EntrepriseSeeder extends Seeder
{
    public function run()
    {
        Entreprise::factory(50)->create(); // Génère 50 entreprises fictives
    }
}