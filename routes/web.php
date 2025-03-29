<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\OffreController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddleware;

use App\Http\Middleware\EnsureUserHasRole;

use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("loginForm");
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//->middleware(RoleMiddleware::class.':etudiant')


Route::get('/gestionEntreprises', function () {return view('gestionEntreprises');})
->name("gestionEntreprises");

Route::get('/gestionEtudiants', function () {
    return view('gestionEtudiants');
})->name("gestionEtudiants");

Route::get('/gestionPilotes', function () {
    return view('gestionPilotes');
})->name("gestionPilotes");

Route::get('/whishlist', function () {
    return view('whishlist');
})->name("whishlist");

Route::get('/offres', [OffreController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Etudiant|Admin'])
->name('offres');

Route::get('/offres/{id}', [OffreController::class, 'afficher_offre'])
->middleware(AuthMiddleware::class)
->name('focusOffre');


Route::get('/entreprises', [EntrepriseController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
->name('entreprises');

Route::get('/entreprises/{id}', [EntrepriseController::class, 'afficher_entreprise'])
->middleware(AuthMiddleware::class)
->name('focusEntreprise');


Route::get('/gestionEntreprises', [EntrepriseController::class, 'afficher_gestion'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin']);

Route::post('/gestionEntreprises', [EntrepriseController::class, 'store'])
->middleware(AuthMiddleware::class)->name("store");