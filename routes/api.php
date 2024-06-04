<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MateriReadingController;
use App\Http\Controllers\Api\UjianController;
use App\Http\Controllers\Api\MateriListeningController;
use App\Http\Controllers\Api\MateriGrammarController;
use App\Http\Controllers\Api\UjianListeningController;
use App\Http\Controllers\Api\UjianGrammarController;
use App\Http\Controllers\Api\UjianReadingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" mid`dleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(UjianListeningController::class)->group(function() {
    Route::get('/ujian-listening', 'index')->name('ujian-listening.index');
    Route::get('/ujian-listening/{code}', 'getUjianByCode')->name('ujian-listening.getUjianByCode');
});

Route::controller(UjianGrammarController::class)->group(function() {
    Route::get('/ujian-grammar', 'index')->name('ujian-grammar.index');
});

Route::controller(UjianReadingController::class)->group(function() {
    Route::get('/ujian-reading', 'index')->name('ujian-reading.index');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('/category', 'index')->name('category.index');
});

Route::controller(MateriListeningController::class)->group(function() {
    Route::get('/MateriListening', 'index')->name('Materi.index');
});

Route::controller(MateriGrammarController::class)->group(function() {
    Route::get('/materiGrammar', 'index')->name('materi.index');
    Route::get('/images/{filename}', [MateriGrammarController::class, 'show']);
});

Route::controller(MateriReadingController::class)->group(function() {
    Route::get('/materiReading', 'index')->name('materiReading.index');
    Route::get('/images/{filename}', [MateriGrammarController::class, 'show']);
});


