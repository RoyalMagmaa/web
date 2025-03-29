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

Route::get('/gestionOffres', function () {
    return view('gestionEtudiants');
})->name("gestionOffres");

Route::get('/gestionPilotes', function () {
    return view('gestionPilotes');
})->name("gestionPilotes");

Route::get('/whishlist', function () {
    return view('whishlist');
})->name("wishlist");

Route::get('/offres', [OffreController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
//->middleware(['auth', RoleMiddleware::class.':Etudiant|Admin'])
->name('offres');

Route::get('/offres/{id}', [OffreController::class, 'afficher_offre'])
->middleware(AuthMiddleware::class)
->name('focusOffre');


Route::get('/entreprises/liste', [EntrepriseController::class, 'afficher_liste'])
->middleware(AuthMiddleware::class)
->name('entreprises.liste');

Route::get('/entreprises/creer', [EntrepriseController::class, 'afficher_creer'])
->middleware(AuthMiddleware::class)
->name('entreprises.creer');

Route::get('/entreprises/modifier/{id}', [EntrepriseController::class, 'afficher_modifier'])
->middleware(AuthMiddleware::class)
->name('entreprises.modifier');

Route::put('/entreprises/modifier/{id}', [EntrepriseController::class, 'update'])
->middleware(AuthMiddleware::class)
->name("entreprises.update");

Route::post('/entreprises/creer', [EntrepriseController::class, 'store'])
->middleware(AuthMiddleware::class)
->name("entreprises.store");

Route::get('/entreprises/liste/{id}', [EntrepriseController::class, 'afficher'])
->middleware(AuthMiddleware::class)
->name('entreprises.focus');

/*
Route::post('/entreprises/liste', [EntrepriseController::class, 'store'])
->middleware(AuthMiddleware::class)->name("store");*/