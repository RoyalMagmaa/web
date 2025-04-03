<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Offre;

class OffreTest extends TestCase
{
    public function test_offre_has_entreprise_relationship()
    {
        $offre = new Offre();

        // Vérifie que la méthode 'entreprise' existe dans le modèle Offre
        $this->assertTrue(method_exists($offre, 'entreprise'));
    }
}