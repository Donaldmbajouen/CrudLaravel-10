<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//creer
Route::get('/create', [CrudController::class, 'AjouterEtudiant'])->name('create')->middleware('auth')  ;
Route::post('/create/traitement', [CrudController::class, 'AjouterTraitement']);
//afficher
Route::get('/', [CrudController::class, 'ListEtudiant'])->name('liste')->middleware('auth')  ;
//modifier
Route::get('/update/{id}', [CrudController::class, 'UpdateEtudiant'])->name('update')->middleware('auth')  ;
Route::post('/update/traitement', [CrudController::class, 'UpdateTraitement']);
//supprimer un etudiant
Route::get('/supprimer/{id}', [CrudController::class, 'supprimerEtudiant'])->name('delete')->middleware('auth')  ;
//voir un etudiant
Route::get('/Show/{id}', [CrudController::class, 'ShowEtudiant'])->name('show');
//Authentification
Route::get('/login', [AuthController::class, 'Login' ])->name('login');
Route::post('/login', [AuthController::class, 'Dologin' ]);
//
Route::delete('/logout', [AuthController::class, 'logout' ])->name('logout');






