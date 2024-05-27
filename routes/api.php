<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\MateriReadingController;
use App\Http\Controllers\Api\UjianController;
use App\Http\Controllers\Api\MateriListeningController;
use App\Http\Controllers\Api\MateriGrammarController;
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

Route::controller(UjianController::class)->group(function() {
    Route::get('/ujian', 'index')->name('ujian.index');
});

Route::controller(CategoryController::class)->group(function() {
    Route::get('/category', 'index')->name('category.index');
});

Route::controller(MateriListeningController::class)->group(function() {
    Route::get('/MateriListening', 'index')->name('Materi.index');
});

Route::controller(MateriGrammarController::class)->group(function() {
    Route::get('/materiGrammar', 'index')->name('materi.index');
});

Route::controller(MateriReadingController::class)->group(function() {
    Route::get('/materiReading', 'index')->name('materiReading.index');
});


