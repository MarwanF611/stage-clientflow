<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
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

    // Customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/customers/delete', [CustomerController::class, 'delete'])->name('customers.delete');
    Route::get('/customers/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/customers/update', [CustomerController::class, 'update'])->name('customers.update');

    // Products
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('/products/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');

    Route::get('/products/delete', [ProductController::class, 'delete'])->name('products.delete');
    Route::get('/products/edit', [ProductController::class, 'edit'])->name('products.edit');

    // Quotes
    Route::get('/quotes', [QuoteController::class, 'index'])->name('quotes.index');
    Route::get('/quotes/create', [QuoteController::class, 'create'])->name('quotes.create');
    Route::post('/quotes/store', [QuoteController::class, 'store'])->name('quotes.store');
    Route::get('/quotes/download', [QuoteController::class, 'download'])->name('quotes.download');
    Route::get('/quotes/delete', [QuoteController::class, 'delete'])->name('quotes.delete');
    Route::get('/quotes/edit', [QuoteController::class, 'edit'])->name('quotes.edit');
    Route::post('/quotes/update', [QuoteController::class, 'update'])->name('quotes.update');

    // Invoices
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/invoices/store', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/invoices/download', [InvoiceController::class, 'download'])->name('invoices.download');
    Route::get('/invoices/delete', [InvoiceController::class, 'delete'])->name('invoices.delete');
    Route::get('/invoices/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::post('/invoices/update', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::get('/invoices/mail', [InvoiceController::class, 'sendMail'])->name('invoices.mail');
});

require __DIR__ . '/auth.php';
