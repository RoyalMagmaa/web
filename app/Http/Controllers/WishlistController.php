<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Offre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function ajouter(Request $request, $offre_id)
    {
        $utilisateur_id = Auth::id();

        Wishlist::create([
            'utilisateur_id' => $utilisateur_id,
            'offre_id' => $offre_id,
        ]);

        return redirect()->back()->with('success', 'Offre ajoutée à la wishlist.');
    }

    public function supprimer($id)
    {
        $utilisateur_id = Auth::id();
        Wishlist::where('id', $id)->where('utilisateur_id', $utilisateur_id)->delete();

        return redirect()->back()->with('success', 'Offre retirée de la wishlist.');
    }

    public function afficher()
    {
        $utilisateur_id = Auth::id();
        $wishlist = Wishlist::with(['offre', 'offre.entreprise'])->where('utilisateur_id', $utilisateur_id)->get();
        return view('wishlist', compact('wishlist'));
    }
}
