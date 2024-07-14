<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivrerController;
use App\Http\Controllers\AcheterController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CommanderController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MedicammentController;

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

Route::get('/', function () {
    return view('welcome');
});


// Routes pour le contrôleur Patient
Route::prefix('patient')->group(function(){
    
    Route::get('/read', [PatientController::class, 'index'])->name('patient.index');
    Route::get('/read/{id_pat}', [PatientController::class, 'show'])->name('patient.show');
    // Route::post('/create/{nom}/{prenom}/{age}/{sexe}/{adresse}/{tel}', [PatientController::class, 'update'])->name('patient.update');
    Route::post('/create/{num}', [PatientController::class, 'store'])->name('patient.store');
    Route::post('/create', [PatientController::class, 'create'])->name('patient.create');
    // Route::put('/update/{id_pat}/{nom}/{prenom}/{age}/{sexe}/{adresse}/{tel}', [PatientController::class, 'update'])->name('patient.update');
    Route::put('/update/{id_pat}/{num}', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('/delete/{id_pat}', [PatientController::class, 'destroy'])->name('patient.destroy');
    // Route::delete('/delete', [PatientController::class, 'truncate'])->name('patient.truncate');

});


// Routes pour le contrôleur Employe
Route::prefix('employe')->group(function(){
    
    Route::get('/read', [EmployeController::class, 'index'])->name('employe.index');
    Route::get('/read/{id_emp}', [EmployeController::class, 'show'])->name('employe.show');
    // Route::post('/create/{nom}/{prenom}/{sexe}/{adresse}/{tel}/{date}/{compte}/{salaire}', [EmployeController::class, 'store'])->name('employe.store');
    Route::post('/create/{num}', [EmployeController::class, 'store'])->name('employe.store');
    Route::post('/create', [EmployeController::class, 'create'])->name('employe.create');
    // Route::put('/update/{id_emp}/{nom}/{prenom}/{sexe}/{adresse}/{tel}/{date}/{compte}/{salaire}', [EmployeController::class, 'update'])->name('employe.update');
    Route::put('/update/{id_emp}/{num}', [EmployeController::class, 'update'])->name('employe.update');
    Route::delete('/delete/{id_emp}', [EmployeController::class, 'destroy'])->name('employe.destroy');
    // Route::delete('/delete', [EmployeController::class, 'truncate'])->name('employe.truncate');

});


// Routes pour le contrôleur Medicamment
Route::prefix('medicamment')->group(function(){
    
    Route::get('/read', [MedicammentController::class, 'index'])->name('medicamment.index');
    Route::get('/read/{id_med}', [MedicammentController::class, 'show'])->name('medicamment.show');
    Route::post('/create/{intitule}/{quantite}/{categorie}', [MedicammentController::class, 'store'])->name('medicamment.store');
    Route::post('/create', [MedicammentController::class, 'create'])->name('medicamment.create');
    Route::put('/update/{id_med}/{intitule}/{quantite}/{categorie}', [MedicammentController::class, 'update'])->name('medicamment.update');
    Route::delete('/delete/{id_med}', [MedicammentController::class, 'destroy'])->name('medicamment.destroy');
    // Route::delete('/delete', [MedicammentController::class, 'truncate'])->name('medicamment.truncate');

});


// Routes pour le contrôleur Fournisseur
Route::prefix('fournisseur')->group(function(){
    
    Route::get('/read', [FournisseurController::class, 'index'])->name('fournisseur.index');
    Route::get('/read/{id_fou}', [FournisseurController::class, 'show'])->name('fournisseur.show');
    Route::post('/create/{nom}/{tel}/{adresse}', [FournisseurController::class, 'store'])->name('fournisseur.store');
    Route::post('/create', [FournisseurController::class, 'create'])->name('fournisseur.create');
    Route::put('/update/{id_fou}/{nom}/{tel}/{adresse}', [FournisseurController::class, 'update'])->name('fournisseur.update');
    Route::delete('/delete/{id_fou}', [FournisseurController::class, 'destroy'])->name('fournisseur.destroy');
    // Route::delete('/delete', [FournisseurController::class, 'truncate'])->name('fournisseur.truncate');
});


// Routes pour le contrôleur Acheter
Route::prefix('acheter')->group(function(){
    
    Route::get('/read', [AcheterController::class, 'index'])->name('acheter.index');
    Route::get('/read/{id_pat}/{id_med}/{date}', [AcheterController::class, 'show'])->name('acheter.show');
    Route::get('/read/{id_pat}/{id_med}', [AcheterController::class, 'index_show'])->name('acheter.index_show');
    Route::post('/create/{id_pat}/{id_med}/{quantite}/{prix}', [AcheterController::class, 'store'])->name('acheter.store');
    Route::post('/create', [AcheterController::class, 'create'])->name('acheter.create');
    Route::put('/update/{id_pat}/{id_med}/{date}/{quantite}/{prix}', [AcheterController::class, 'update'])->name('acheter.update');
    Route::delete('/delete/{id_pat}/{id_med}/{date}', [AcheterController::class, 'destroy'])->name('acheter.destroy');
    Route::delete('/delete', [AcheterController::class, 'truncate'])->name('acheter.truncate');
});


// Routes pour le contrôleur Commander
Route::prefix('commander')->group(function(){
    
    Route::get('/read', [CommanderController::class, 'index'])->name('commander.index');
    Route::get('/read/{id_emp}/{id_med}/{date}', [CommanderController::class, 'show'])->name('commander.show');
    Route::get('/read/{id_emp}/{id_med}', [CommanderController::class, 'index_show'])->name('commander.index_show');
    Route::post('/create/{id_emp}/{id_med}/{quantite}', [CommanderController::class, 'store'])->name('commander.store');
    Route::post('/create', [CommanderController::class, 'create'])->name('commander.create');
    Route::put('/update/{id_emp}/{id_med}/{date}/{quantite}', [CommanderController::class, 'update'])->name('commander.update');
    Route::delete('/delete/{id_emp}/{id_med}/{date}', [CommanderController::class, 'destroy'])->name('commander.destroy');
    Route::delete('/delete', [CommanderController::class, 'truncate'])->name('commander.truncate');
});


// Routes pour le contrôleur Livrer
Route::prefix('livrer')->group(function(){
    
    Route::get('/read', [LivrerController::class, 'index'])->name('livrer.index');
    Route::get('/read/{id_fou}/{id_med}/{date}', [LivrerController::class, 'show'])->name('livrer.show');
    Route::get('/read/{id_fou}/{id_med}', [LivrerController::class, 'index_show'])->name('livrer.index_show');
    Route::post('/create/{id_fou}/{id_med}/{quantite}/{montant}', [LivrerController::class, 'store'])->name('livrer.store');
    Route::post('/create', [LivrerController::class, 'create'])->name('livrer.create');
    Route::put('/update/{id_fou}/{id_med}/{date}/{quantite}/{montant}', [LivrerController::class, 'update'])->name('livrer.update');
    Route::delete('/delete/{id_fou}/{id_med}/{date}', [LivrerController::class, 'destroy'])->name('livrer.destroy');
    Route::delete('/delete', [LivrerController::class, 'truncate'])->name('livrer.truncate');
});