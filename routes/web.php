<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\PiloteController;
use App\Http\Controllers\WishlistController;

use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddleware;

use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'showLoginForm'])->name("login");
Route::post('/login', [AuthController::class, 'login'])->name("loginForm");
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/wishlist/ajouter/{offre_id}', [WishlistController::class, 'ajouter'])
->name('wishlist.ajouter')
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Etudiant|Admin']);

Route::delete('/wishlist/supprimer/{id}', [WishlistController::class, 'supprimer'])
->name('wishlist.supprimer')
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Etudiant|Admin']);

Route::get('/wishlist', [WishlistController::class, 'afficher'])
->name('wishlist')
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Etudiant|Admin']);



Route::get('/offres/liste', [OffreController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
->name('offres.liste');

Route::get('/offres/liste/{id}', [OffreController::class, 'afficher'])
->middleware(AuthMiddleware::class)
->name('offres.focus');

Route::get('/offres/creer', [OffreController::class, 'afficher_creer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('offres.creer');

Route::get('/offres/modifier/{id}', [OffreController::class, 'afficher_modifier'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('offres.modifier');

Route::put('/offres/modifier/{id}', [OffreController::class, 'update'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name("offres.update");

Route::post('/offres/creer', [OffreController::class, 'store'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name("offres.store");

Route::delete('/offres/{id}', [OffreController::class, 'supprimer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('offres.supprimer');



Route::get('/entreprises/liste', [EntrepriseController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
->name('entreprises.liste');

Route::get('/entreprises/creer', [EntrepriseController::class, 'afficher_creer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('entreprises.creer');

Route::get('/entreprises/modifier/{id}', [EntrepriseController::class, 'afficher_modifier'])
->middleware(AuthMiddleware::class)
->name('entreprises.modifier');

Route::put('/entreprises/modifier/{id}', [EntrepriseController::class, 'update'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name("entreprises.update");

Route::post('/entreprises/creer', [EntrepriseController::class, 'store'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name("entreprises.store");

Route::get('/entreprises/liste/{id}', [EntrepriseController::class, 'afficher'])
->middleware(AuthMiddleware::class)
->name('entreprises.focus');

Route::delete('/entreprises/{id}', [EntrepriseController::class, 'supprimer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('entreprises.supprimer');



Route::get('/etudiants/liste', [EtudiantController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('etudiants.liste');

Route::get('/etudiants/liste/{id}', [EtudiantController::class, 'afficher'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('etudiants.focus');

Route::get('/etudiants/creer', [EtudiantController::class, 'afficher_creer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('etudiants.creer');

Route::get('/etudiants/modifier/{id}', [EtudiantController::class, 'afficher_modifier'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('etudiants.modifier');

Route::put('/etudiants/modifier/{id}', [EtudiantController::class, 'update'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name("etudiants.update");

Route::post('/etudiants/creer', [EtudiantController::class, 'store'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name("etudiants.store");

Route::delete('/etudiants/{id}', [EtudiantController::class, 'supprimer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Pilote|Admin'])
->name('etudiants.supprimer');



Route::get('/pilotes/liste', [PiloteController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Admin'])
->name('pilotes.liste');

Route::get('/pilotes/liste/{id}', [PiloteController::class, 'afficher'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Admin'])
->name('pilotes.focus');

Route::get('/pilotes/creer', [PiloteController::class, 'afficher_creer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Admin'])
->name('pilotes.creer');

Route::get('/pilotes/modifier/{id}', [PiloteController::class, 'afficher_modifier'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Admin'])
->name('pilotes.modifier');

Route::put('/pilotes/modifier/{id}', [PiloteController::class, 'update'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Admin'])
->name("pilotes.update");

Route::post('/pilotes/creer', [PiloteController::class, 'store'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Admin'])
->name("pilotes.store");

Route::delete('/pilotes/{id}', [PiloteController::class, 'supprimer'])
->middleware(AuthMiddleware::class)
->middleware(['auth', RoleMiddleware::class.':Admin'])
->name('pilotes.supprimer');