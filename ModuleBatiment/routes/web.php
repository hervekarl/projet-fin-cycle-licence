<?php

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\OccuperController;
use App\Http\Controllers\BatimentController;
use App\Http\Controllers\PossederController;
use App\Http\Controllers\EquipementController;

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

Route::get('/', function(){
    return view('welcome');
});


// Routes pour le contrôleur Batiment
Route::prefix('batiment')->group(function(){
    
    Route::get('/read', [BatimentController::class, 'index'])->name('batiment.index');
    Route::get('/read/{id_bat}', [BatimentController::class, 'show'])->name('batiment.show');
    Route::post('/create/{nbre_niveau}', [BatimentController::class, 'store'])->name('batiment.store');
    Route::post('/create', [BatimentController::class, 'create'])->name('batiment.create');
    Route::put('/update/{id_bat}/{nbre_niveau}', [BatimentController::class, 'update'])->name('batiment.update');
    Route::delete('/delete/{id_bat}', [BatimentController::class, 'destroy'])->name('batiment.destroy');
    // Route::delete('/delete', [BatimentController::class, 'truncate'])->name('batiment.truncate');
});


// Routes pour le contrôleur Niveau
Route::prefix('niveau')->group(function(){
    
    Route::get('/read', [NiveauController::class, 'index'])->name('niveau.index');
    Route::get('/read/{id_niv}', [NiveauController::class, 'show'])->name('niveau.show');
    Route::post('/create/{num_etage}/{nbre_salle}/{id_bat}', [NiveauController::class, 'store'])->name('niveau.store');
    Route::post('/create', [NiveauController::class, 'create'])->name('niveau.create');
    Route::put('/update/{id_niv}/{num_etage}/{nbre_salle}/{id_bat}', [NiveauController::class, 'update'])->name('niveau.update');
    Route::delete('/delete/{id_niv}', [NiveauController::class, 'destroy'])->name('niveau.destroy');
    // Route::delete('/delete', [NiveauController::class, 'truncate'])->name('niveau.truncate');
});


// Routes pour le contrôleur Salle
Route::prefix('salle')->group(function(){
    
    Route::get('/read', [SalleController::class, 'index'])->name('salle.index');
    Route::get('/read/{id_sal}', [SalleController::class, 'show'])->name('salle.show');
    Route::post('/create/{nom}/{type}/{id_niv}', [SalleController::class, 'store'])->name('salle.store');
    Route::post('/create', [SalleController::class, 'create'])->name('salle.create');
    Route::put('/update/{id_sal}/{nom}/{type}/{id_niv}', [SalleController::class, 'update'])->name('salle.update');
    Route::delete('/delete/{id_sal}', [SalleController::class, 'destroy'])->name('salle.destroy');
    // Route::delete('/delete', [SalleController::class, 'truncate'])->name('salle.truncate');
});


// Routes pour le contrôleur Equipement
Route::prefix('equipement')->group(function(){
    
    Route::get('/read', [EquipementController::class, 'index'])->name('equipement.index');
    Route::get('/read/{id_equipl}', [EquipementController::class, 'show'])->name('equipement.show');
    Route::post('/create/{nom}/{type}', [EquipementController::class, 'store'])->name('equipement.store');
    Route::post('/create', [EquipementController::class, 'create'])->name('equipement.create');
    Route::put('/update/{id_equip}/{nom}/{type}', [EquipementController::class, 'update'])->name('equipement.update');
    Route::delete('/delete/{id_equip}', [EquipementController::class, 'destroy'])->name('equipement.destroy');
    // Route::delete('/delete', [EquipementController::class, 'truncate'])->name('equipement.truncate');
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


// Routes pour le contrôleur Posseder
Route::prefix('posseder')->group(function(){
    
    Route::get('/read', [PossederController::class, 'index'])->name('posseder.index');
    Route::get('/read/{id_sal}/{id_equip}/{date_debut}', [PossederController::class, 'show'])->name('posseder.show');
    Route::get('/read/{id_sal}/{id_equip}', [PossederController::class, 'index_show'])->name('posseder.index_show');
    Route::post('/create/{id_sal}/{id_equip}', [PossederController::class, 'store'])->name('posseder.store');
    Route::post('/create', [PossederController::class, 'create'])->name('posseder.create');
    Route::put('/update/{id_sal}/{id_equip}/{date_debut}/{date_fin}', [PossederController::class, 'update'])->name('posseder.update');
    Route::delete('/delete/{id_sal}/{id_equip}/{date_debut}', [PossederController::class, 'destroy'])->name('posseder.destroy');
    Route::delete('/delete', [PossederController::class, 'truncate'])->name('posseder.truncate');
});

// Routes pour le contrôleur Occuper
Route::prefix('occuper')->group(function(){
    
    Route::get('/read', [OccuperController::class, 'index'])->name('occuper.index');
    Route::get('/read/{id_sal}/{id_pat}/{date_debut}', [OccuperController::class, 'show'])->name('occuper.show');
    Route::get('/read/{id_sal}/{id_pat}', [OccuperController::class, 'index_show'])->name('occuper.index_show');
    Route::post('/create/{id_sal}/{id_pat}', [OccuperController::class, 'store'])->name('occuper.store');
    Route::post('/create', [OccuperController::class, 'create'])->name('occuper.create');
    Route::put('/update/{id_sal}/{id_pat}/{date_debut}/{date_fin}', [OccuperController::class, 'update'])->name('occuper.update');
    Route::delete('/delete/{id_sal}/{id_pat}/{date_debut}', [OccuperController::class, 'destroy'])->name('occuper.destroy');
    Route::delete('/delete', [OccuperController::class, 'truncate'])->name('occuper.truncate');
});