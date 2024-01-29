<?php

use App\Http\Controllers\ProductenController;
use App\Http\Controllers\KlantenController;
use App\Http\Controllers\ProfileController;
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



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Klanten
    Route::get('/klanten', [KlantenController::class, 'index'])->name('klanten.index');
    Route::get('/klanten/create', [KlantenController::class, 'create'])->name('klanten.create');
    Route::post('/klanten/create', [KlantenController::class, 'store'])->name('klanten.store');

    //producten
    Route::get('/producten', [ProductenController::class, 'index'])->name('producten.index');
    Route::get('/producten/create', [ProductenController::class, 'create'])->name('producten.create');
});

require __DIR__ . '/auth.php';
