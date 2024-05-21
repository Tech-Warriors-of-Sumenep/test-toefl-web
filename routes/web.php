<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\MateriGrammarController;
use App\Http\Controllers\GrammerController;
use App\Http\Controllers\ReadingController;
use App\Http\Controllers\MateriReadingController;
use App\Http\Controllers\SoalListeningController;
use App\Http\Controllers\UjianListeningController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard']);

    // Soal Controllers
    Route::controller(SoalController::class)->group(function () {
        Route::get('/soal', 'index')->name('soal.index');
        Route::get('/soal/create/{ujian}', 'create')->name('soal.create');
        Route::get('/soal/{code}', 'edit')->name('soal.edit');
        Route::post('/soal', 'store')->name('soal.store');
        Route::put('/soal/{code}', 'update')->name('soal.update');
        Route::delete('/soal/{code}', 'destroy')->name('soal.destroy');
    });

    Route::controller(SoalListeningController::class)->group(function () {
        Route::get('/soal-listening', 'index')->name('soal-listening.index');
        Route::get('/soal-listening/create/{ujian}', 'create')->name('soal-listening.create');
        Route::get('/soal-listening/{code}', 'edit')->name('soal-listening.edit');
        Route::post('/soal-listening', 'store')->name('soal-listening.store');
        Route::put('/soal-listening/{code}', 'update')->name('soal-listening.update');
        Route::delete('/soal-listening/{code}', 'destroy')->name('soal-listening.destroy');
    });

    // Materi Controllers
    Route::controller(MateriGrammarController::class)->group(function () {
        Route::get('/materiGrammar', 'index')->name('materiGrammar.index');
        Route::get('/materiGrammar/create', 'create')->name('materiGrammar.create');
        Route::get('/materiGrammar/{code}', 'edit')->name('materiGrammar.edit');
        Route::post('/materiGrammar', 'store')->name('materiGrammar.store');
        Route::put('/materiGrammar/{code}', 'update')->name('materiGrammar.update');
        Route::delete('/materiGrammar/{code}', 'destroy')->name('materiGrammar.destroy');
    });

    Route::controller(MateriReadingController::class)->group(function () {
        Route::get('/materiReading', 'index')->name('materiReading.index');
        Route::get('/materiReading/create', 'create')->name('materiReading.create');
        Route::get('/materiReading/{code}', 'edit')->name('materiReading.edit');
        Route::post('/materiReading', 'store')->name('materiReading.store');
        Route::put('/materiReading/{code}', 'update')->name('materiReading.update');
        Route::delete('/materiReading/{code}', 'destroy')->name('materiReading.destroy');
    });

    //  Ujian Controllers
    Route::controller(GrammerController::class)->group(function () {
        Route::get('/ujian-grammar', 'index')->name('ujian-grammar.index');
        Route::get('/ujian-grammar/create', 'create')->name('ujian-grammar.create');
        Route::get('/ujian-grammar/{code}', 'edit')->name('ujian-grammar.edit');
        Route::post('/ujian-grammar', 'store')->name('ujian-grammar.store');
        Route::put('/ujian-grammar/{code}', 'update')->name('ujian-grammar.update');
        Route::delete('/ujian-grammar/{code}', 'destroy')->name('ujian-grammar.destroy');
    });

    Route::controller(UjianListeningController::class)->group(function () {
        Route::get('/ujian-listening', 'index')->name('ujian-listening.index');
        Route::get('/ujian-listening/create', 'create')->name('ujian-listening.create');
        Route::get('/ujian-listening/{code}', 'edit')->name('ujian-listening.edit');
        Route::post('/ujian-listening', 'store')->name('ujian-listening.store');
        Route::put('/ujian-listening/{code}', 'update')->name('ujian-listening.update');
        Route::delete('/ujian-listening/{code}', 'destroy')->name('ujian-listening.destroy');
    });

    Route::controller(ReadingController::class)->group(function () {
        Route::get('/ujian-reading', 'index')->name('ujian-reading.index');
        Route::get('/ujian-reading/create', 'create')->name('ujian-reading.create');
        Route::get('/ujian-reading/{code}', 'edit')->name('ujian-reading.edit');
        Route::post('/ujian-reading', 'store')->name('ujian-reading.store');
        Route::put('/ujian-reading/{code}', 'update')->name('ujian-reading.update');
        Route::delete('/ujian-reading/{code}', 'destroy')->name('ujian-reading.destroy');
    });
});

Route::post('/log', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
