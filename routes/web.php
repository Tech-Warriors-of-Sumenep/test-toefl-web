<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\MateriGrammarController;
use App\Http\Controllers\MateriListeningController; // dari HEAD
use App\Http\Controllers\ContohSoalController;
use App\Http\Controllers\GrammerController; // dari ed454e9
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\ContohJawabanController;
use App\Http\Controllers\ContohSoalReadingController;
use App\Http\Controllers\KunciJawabanController;
use App\Http\Controllers\ReadingController; // dari ed454e9
use App\Http\Controllers\MateriReadingController; // dari ed454e9
use App\Http\Controllers\SoalListeningController;
use App\Http\Controllers\UjianListeningController; // dari ed454e9
use App\Http\Controllers\SoalGrammarController; // dari ed454e9
use App\Http\Controllers\SoalReadingController;
use App\Http\Controllers\FlipMateriController;
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
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

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
        Route::get('/soal-listening/detail-soal/{ujian}', 'detail_soal')->name('soal-listening.detail-soal');
        Route::get('/soal-listening/create/{ujian}', 'create')->name('soal-listening.create');
        Route::get('/soal-listening/{code}', 'edit')->name('soal-listening.edit');
        Route::get('/soal-listening/details/{code}', 'show')->name('soal-listening.show');
        Route::post('/soal-listening', 'store')->name('soal-listening.store');
        Route::put('/soal-listening/{code}', 'update')->name('soal-listening.update');
        Route::delete('/soal-listening/{code}', 'destroy')->name('soal-listening.destroy');
    });

    Route::controller(SoalReadingController::class)->group(function () {
        Route::get('/soal-reading', 'index')->name('soal-reading.index');
        Route::get('/soal-reading/detail-soal/{ujian}', 'detail_soal')->name('soal-reading.detail-soal');
        Route::get('/soal-reading/create/{ujian}', 'create')->name('soal-reading.create');
        Route::get('/soal-reading/{code}', 'edit')->name('soal-reading.edit');
        Route::get('/soal-reading/details/{code}', 'show')->name('soal-reading.show');
        Route::post('/soal-reading', 'store')->name('soal-reading.store');
        Route::put('/soal-reading/{code}', 'update')->name('soal-reading.update');
        Route::delete('/soal-reading/{code}', 'destroy')->name('soal-reading.destroy');
    });
    Route::controller(SoalGrammarController::class)->group(function () {
        Route::get('/soal-grammar', 'index')->name('soal-grammar.index');
        Route::get('/soal-grammar/detail-soal/{ujian}', 'detail_soal')->name('soal-grammar.detail-soal');
        Route::get('/soal-grammar/create/{ujian}', 'create')->name('soal-grammar.create');
        Route::get('/soal-grammar/{code}', 'edit')->name('soal-grammar.edit');
        Route::get('/soal-grammar/details/{code}', 'show')->name('soal-grammar.show');
        Route::post('/soal-grammar', 'store')->name('soal-grammar.store');
        Route::put('/soal-grammar/{code}', 'update')->name('soal-grammar.update');
        Route::delete('/soal-grammar/{code}', 'destroy')->name('soal-grammar.destroy');
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

    // Materi Controllers
    Route::controller(FlipMateriController::class)->group(function () {
        Route::get('/flipMateri/create', 'create')->name('flipMateri.create');
        Route::get('/flipMateri/{code}', 'edit')->name('flipMateri.edit');
        Route::post('/flipMateri', 'store')->name('flipMateri.store');
        Route::put('/flipMateri/{code}', 'update')->name('flipMateri.update');
        Route::delete('/flipMateri/{code}', 'destroy')->name('flipMateri.destroy');
    });

    Route::controller(MateriListeningController::class)->group(function () {
        Route::get('/materiListening', 'index')->name('materiListening.index');
        Route::get('/materiListening/create', 'create')->name('materiListening.create');
        Route::get('/materiListening/{code}', 'edit')->name('materiListening.edit');
        Route::post('/materiListening', 'store')->name('materiListening.store');
        Route::put('/materiListening/{code}', 'update')->name('materiListening.update');
        Route::delete('/materiListening/{code}', 'destroy')->name('materiListening.destroy');
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

    // Jawaban Controller
    Route::controller(JawabanController::class)->group(function () {
        Route::get('/jawaban/{code}', 'create')->name('jawaban.create');
        Route::post('/jawaban', 'store')->name('jawaban.store');
    });

    //contoh soal
    Route::controller(ContohSoalController::class)->group(function () {
        Route::get('/contohsoal-listening', 'index')->name('contohsoal-listening.index');
        Route::get('/contohsoal-listening/detail-soal/{materi}', 'detail_soal')->name('contohsoal-listening.detail-soal');
        Route::get('/contohsoal-listening/create/{materi}', 'create')->name('contohsoal-listening.create');
        Route::get('/contohsoal-listening/{code}', 'edit')->name('contohsoal-listening.edit');
        Route::get('/contohsoal-listening/details/{code}', 'show')->name('contohsoal-listening.show');
        Route::post('/contohsoal-listening', 'store')->name('contohsoal-listening.store');
        Route::put('/contohsoal-listening/{code}', 'update')->name('contohsoal-listening.update');
        Route::delete('/contohsoal-listening/{code}', 'destroy')->name('contohsoal-listening.destroy');
    });

    //contohsoaljawaban
    Route::controller(ContohJawabanController::class)->group(function () {
        Route::get('/contohjawaban/{code}', 'create')->name('contohjawaban.create');
        Route::post('/contohjawaban', 'store')->name('contohjawaban.store');
    });

    Route::controller(ContohSoalReadingController::class)->group(function () {
        Route::get('/contohsoal-reading', 'index')->name('contohsoal-reading.index');
        Route::get('/contohsoal-reading/detail-soal/{materi}', 'detail_soal')->name('contohsoal-reading.detail-soal');
        Route::get('/contohsoal-reading/create/{materi}', 'create')->name('contohsoal-reading.create');
        Route::get('/contohsoal-reading/{code}', 'edit')->name('contohsoal-reading.edit');
        Route::get('/contohsoal-reading/details/{code}', 'show')->name('contohsoal-reading.show');
        Route::post('/contohsoal-reading', 'store')->name('contohsoal-reading.store');
        Route::put('/contohsoal-reading/{code}', 'update')->name('contohsoal-reading.update');
        Route::delete('/contohsoal-reading/{code}', 'destroy')->name('contohsoal-reading.destroy');
    });

    //contohsoaljawaban
    Route::controller(ContohJawabanController::class)->group(function () {
        Route::get('/contohjawaban/{code}', 'create')->name('contohjawaban.create');
        Route::post('/contohjawaban', 'store')->name('contohjawaban.store');
    });

    // Kunci Jawaban Controller
    Route::controller(KunciJawabanController::class)->group(function () {
        Route::get('/kunci-jawaban/{code}', 'create')->name('kunci-jawaban.create');
        Route::post('/kunci-jawaban', 'store')->name('kunci-jawaban.store');
    });
});

Route::post('/log', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
