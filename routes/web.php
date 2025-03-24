<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name("login");

Route::get('/offres', function () {
    return view('offres');
})->name("offres");

Route::get('/entreprises', function () {
    return view('entreprises');
})->name("entreprises");

Route::get('/etudiant', function () {
    return view('etudiant');
})->name("etudiant");

Route::get('/gestionEntreprises', function () {
    return view('gestionEntreprises');
})->name("gestionEntreprises");

Route::get('/gestionEtudiants', function () {
    return view('gestionEtudiants');
})->name("gestionEtudiants");

Route::get('/gestionPilotes', function () {
    return view('gestionPilotes');
})->name("gestionEtudiants");

Route::get('/stats', function () {
    return view('stats');
})->name("stats");

Route::get('/whishlist', function () {
    return view('whishlist');
})->name("whishlist");

Route::post('/offres', [AuthController::class, 'authentificate'])->name('auth');
