<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;

class WishlistTest extends TestCase // Renommé en WishlistTest
{
    public function test_ajouter_retourne_message_si_deja_existe()
    {
        // Mock de l'utilisateur connecté
        Auth::shouldReceive('id')->andReturn(1);

        // Mock de la méthode `exists` pour simuler qu'une offre existe déjà dans la wishlist
        $wishlistMock = Mockery::mock('alias:' . Wishlist::class);
        $wishlistMock->shouldReceive('where->where->exists')->andReturn(true);

        // Mock de la requête
        $request = Mockery::mock(Request::class);

        // Appel de la méthode
        $controller = new WishlistController();
        $response = $controller->ajouter($request, 1);

        // Vérification du message de retour
        $this->assertEquals('Cette offre est déjà dans votre wishlist.', session('error'));
    }
}