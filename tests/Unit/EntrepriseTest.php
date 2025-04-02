<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Entreprise;

class EntrepriseTest extends TestCase
{
    public function test_entreprise_has_offres_relationship()
    {
        $entreprise = new Entreprise();

        $this->assertTrue(method_exists($entreprise, 'offres'));
    }
}