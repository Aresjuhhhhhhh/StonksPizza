<?php

use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VragenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WinkelmandjeController;
use App\Http\Controllers\BekijkenController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

route::resource('menu', MenuController::class);
Route::resource('klant', KlantController::class);
route::get('/Home', [KlantController::class, 'index']);
route::get('/overOns', [KlantController::class, 'overOns']);
route::get('/menu', [KlantController::class, 'menu']);
route::get('/FAQ', [KlantController::class, 'FAQ']);
route::get('/FAQ', [VragenController::class, 'index']);
route::get('/soliciteren', [KlantController::class, 'soliciteren']);
route::get('/profiel', [KlantController::class, 'profiel']);
route::get('/pizzaDashboard', [KlantController::class, 'pizzaDashboard']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/bekijken/{id}', [BekijkenController::class, 'show'])->name('bekijken.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    route::get('/profiel', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/winkelmandje', [WinkelmandjeController::class, 'index']);
    route::get('/cart', [CartController::class, 'index'])->name('klant.bestelling');
    Route::post('/bekijken/store', [BekijkenController::class, 'store'])->name('bekijken.store');
    Route::get('/cart/{id}/edit', [CartController::class, 'edit'])->name('cart.edit');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/winkelmandje/{id}/edit', [CartController::class, 'edit'])->name('cart.edit');



});

require __DIR__ . '/auth.php';
