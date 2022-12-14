<?php

use App\Http\Controllers\CodeAdministrationController;
use App\Http\Controllers\SecteurContoller;
use App\Http\Controllers\TypeAbonnementController;
use App\Http\Controllers\UtilisateurController;
use App\Models\CodeAdministration;
use App\Models\User;
use App\Models\UtilisateurModel;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Utilisateur
Route::post("utilisateur/connexion", [UtilisateurController::class, 'connexion']);
// initiation du premier administrateur
Route::post("utilisateur/add-admin", [UtilisateurController::class, 'store']);
Route::any("utilisateur/index", [UtilisateurController::class, 'index'])->middleware('auth:sanctum');
Route::get("utilisateur/show/{id}", [UtilisateurController::class, 'show'])->middleware('auth:sanctum');
Route::post("utilisateur/ajout-user", [UtilisateurController::class, 'store'])->middleware('auth:sanctum');
Route::get("utilisateur/deconnexion", [UtilisateurController::class, 'deconnexion'])->middleware('auth:sanctum');
Route::get('utilisateur/user-data', [UtilisateurController::class, 'dataUser'])->middleware('auth:sanctum');
Route::post('utilisateur/delete-user', [UtilisateurController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('utilisateur/update', [UtilisateurController::class, 'update'])->middleware('auth:sanctum');

// Secteur
Route::get('secteur/index', [SecteurContoller::class, 'index'])->middleware('auth:sanctum');
Route::post('secteur/ajout-secteur', [SecteurContoller::class, 'store'])->middleware('auth:sanctum');
Route::post('secteur/delete-secteur', [SecteurContoller::class, 'destroy'])->middleware('auth:sanctum');

// code administration 
Route::post('code/store', [CodeAdministrationController::class, 'store'])->middleware('auth:sanctum');
Route::post('code/get-code', [CodeAdministrationController::class, 'show'])->middleware('auth:sanctum');

// Type abonnement
Route::get('type-abonnemnt/index', [TypeAbonnementController::class, 'index'])->middleware('auth:sanctum');
Route::post('type-abonnemnt/delete-type', [TypeAbonnementController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('type-abonnemnt/ajout-type', [TypeAbonnementController::class, 'store'])->middleware('auth:sanctum');
