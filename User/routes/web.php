<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManipulerController;

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


Route::prefix('user')->group(function(){
    
    Route::get('/read', [UserController::class, 'index'])->name('user.index');
    Route::get('/read/{id_user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/login/{name}/{passwd}', [UserController::class, 'login'])->name('user.login');
    // Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
    // Route::post('/create/{name}/{passwd}/{admin}/{id_mod}', [UserController::class, 'update'])->name('user.update');
    Route::post('/create/{name}/{passwd}', [UserController::class, 'store'])->name('user.store');
    Route::post('/create', [UserController::class, 'create'])->name('user.create');
    // Route::put('/update/{id_user}/{name}/{passwd}/{admin}/{id_mod}', [UserController::class, 'update'])->name('user.update');
    Route::put('/update/{id_user}/{name}/{passwd}', [UserController::class, 'update'])->name('user.update');

    // Route::put('/update/{id_user}/{name}/{passwd}/{insert}/{select}/{update}/{delete}/{admin}/{id_mod}', [UserController::class, 'update'])->name('user.update');

    Route::delete('/delete/{id_user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::delete('/delete', [UserController::class, 'truncate'])->name('user.truncate');

});


Route::prefix('manipuler')->group(function(){
    
    Route::get('/read', [ManipulerController::class, 'index'])->name('manipuler.index');
    Route::get('/read/{id_user}/{id_mod}', [ManipulerController::class, 'show'])->name('manipuler.show');
    Route::post('/create/{id_user}/{id_mod}', [ManipulerController::class, 'store'])->name('manipuler.store');
    Route::post('/create', [ManipulerController::class, 'create'])->name('manipuler.create');
    Route::put('/update/{id_user}/{id_mod}', [ManipulerController::class, 'update'])->name('manipuler.update');
    Route::delete('/delete/{id_user}/{id_mod}', [ManipulerController::class, 'destroy'])->name('manipuler.destroy');
    Route::delete('/delete', [ManipulerController::class, 'truncate'])->name('manipuler.truncate');
});
