<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Statut;

class StatutTest extends TestCase
{
    public function test_statut_has_utilisateurs_relationship()
    {
        $statut = new Statut();

        $this->assertTrue(method_exists($statut, 'utilisateurs'));
    }
}