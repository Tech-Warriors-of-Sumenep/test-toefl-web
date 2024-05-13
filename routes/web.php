<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\MateriGrammarController;
use Illuminate\Support\Facades\Route;

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


Route::middleware('guest')->group(function() {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [HomeController::class, 'dashboard']);

    Route::controller(UjianController::class)->group(function() {
        Route::get('/ujian', 'index')->name('ujian.index');
        Route::get('/ujian/create', 'create')->name('ujian.create');
        Route::get('/ujian/{code}', 'edit')->name('ujian.edit');
        Route::post('/ujian', 'store')->name('ujian.store');
        Route::put('/ujian/{code}', 'update')->name('ujian.update');
        Route::delete('/ujian/{code}', 'destroy')->name('ujian.destroy');
    });

    Route::controller(SoalController::class)->group(function() {
        Route::get('/soal', 'index')->name('soal.index');
        Route::get('/soal/create', 'create')->name('soal.create');
        Route::get('/soal/{code}', 'edit')->name('soal.edit');
        Route::post('/soal', 'store')->name('soal.store');
        Route::put('/soal/{code}', 'update')->name('soal.update');
        Route::delete('/soal/{code}', 'destroy')->name('soal.destroy');
    });

    Route::controller(MateriGrammarController::class)->group(function() {
        Route::get('/materiGrammar', 'index')->name('materiGrammar.index');
         Route::get('/materiGrammar/create', 'create')->name('materiGrammar.create');
         Route::get('/materiGrammar/{code}', 'edit')->name('materiGrammar.edit');
         Route::post('/materiGrammar', 'store')->name('materiGrammar.store');
         Route::put('/materiGrammar/{code}', 'update')->name('materiGrammar.update');
         Route::delete('/materiGrammar/{code}', 'destroy')->name('materiGrammar.destroy');
     });
});

Route::post('/log', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');