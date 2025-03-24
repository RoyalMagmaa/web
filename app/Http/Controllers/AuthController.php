<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function authentificate(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
        return redirect()->route('offres');
    }
}
