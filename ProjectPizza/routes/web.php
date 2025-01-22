<?php

use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VragenController;
use App\Http\Controllers\WinkelmandjeController;
use App\Http\Controllers\BekijkenController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/Home', [KlantController::class, 'index']);
Route::get('/overOns', [KlantController::class, 'overOns']);
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/FAQ', [VragenController::class, 'index'])->name('faq.index');
Route::get('/soliciteren', [KlantController::class, 'soliciteren']);
Route::get('/profiel', [KlantController::class, 'profiel']);
Route::get('/pizzaDashboard', [KlantController::class, 'pizzaDashboard']);
Route::get('/bekijken/{id}', [BekijkenController::class, 'show'])->name('bekijken.show');

// Resource Routes
Route::resource('menu', MenuController::class);
Route::resource('klant', KlantController::class);

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Management
    Route::get('/profiel', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-woonplaats', [ProfileController::class, 'updateWoonplaats'])->name('profile.update-woonplaats');
    Route::put('/profile/update-phone-number', [ProfileController::class, 'updatePhoneNumber'])->name('profile.update-phone-number');
    Route::put('/profile/update-address', [ProfileController::class, 'updateAddress'])->name('profile.update-address');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Winkelmandje Routes
    Route::get('/winkelmandje', [WinkelmandjeController::class, 'index'])->name('winkelmandje.index');
    Route::get('/winkelmandje/{id}/edit', [WinkelmandjeController::class, 'edit'])->name('winkelmandje.edit');
    Route::post('/winkelmandje/toevoegen', [WinkelmandjeController::class, 'toevoegen'])->name('winkelmandje.toevoegen');
    Route::delete('/winkelmandje/{winkelmandje}/verwijderen/{ingredient}', [WinkelmandjeController::class, 'verwijderen'])->name('winkelmandje.verwijderen');
    Route::delete('/winkelmandje/{id}', [WinkelmandjeController::class, 'destroy'])->name('winkelmandje.destroy');
    Route::put('/winkelmandje/update/{id}', [WinkelmandjeController::class, 'update'])->name('winkelmandje.update');

    // Cart Routes
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/order', [CartController::class, 'placeOrder'])->name('cart.placeOrder');
    // Bekijken Routes
    Route::post('/bekijken/store', [BekijkenController::class, 'store'])->name('bekijken.store');

    //sucessPagina
    Route::get('/success', function () {
        return view('klant.successPagina');
    })->name('klant.successPagina');
    Route::get('/success', [OrderController::class, 'showSuccessPage'])->name('klant.successPagina');
    Route::put('/orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');

        // Manager Routes
        Route::get('/medewerker', [MedewerkerController::class, 'index'])->name('medewerker.index');
        Route::get('/werknemers/show/{order}', [MedewerkerController::class, 'show'])->name('werknemers.show');
        Route::put('/werknemers/update/{order}', [MedewerkerController::class, 'update'])->name('werknemers.update');
        Route::delete('/werknemers/orders/{order}', [MedewerkerController::class, 'destroy'])->name('werknemers.destroy');


});


require __DIR__ . '/auth.php';
