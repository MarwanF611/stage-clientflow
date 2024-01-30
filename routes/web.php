<?php

use App\Http\Controllers\FacturenController;
use App\Http\Controllers\OffertesController;
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
    Route::post('/klanten/store', [KlantenController::class, 'store'])->name('klanten.store');

    // Producten
    Route::get('/producten', [ProductenController::class, 'index'])->name('producten.index');
    Route::get('/producten/create', [ProductenController::class, 'create'])->name('producten.create');
    Route::post('/producten/store', [ProductenController::class, 'store'])->name('producten.store');

    // Offertes
    Route::get('/offertes', [OffertesController::class, 'index'])->name('offertes.index');

    // Facturen /
    Route::get('/facturen/generate', [FacturenController::class, 'generatePdf'])->name('facturen.generate');
    Route::get('/facturen', [FacturenController::class, 'index'])->name('facturen.index');
});

require __DIR__ . '/auth.php';
