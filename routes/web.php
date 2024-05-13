<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UjianController;
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
});

Route::post('/log', [AuthController::class, 'auth'])->name('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');