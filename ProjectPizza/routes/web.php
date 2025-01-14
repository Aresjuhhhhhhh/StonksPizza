<?php

use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/overOns', [KlantController::class, 'overOns']);
route::get('/menu', [KlantController::class, 'menu']);
route::get('/FAQ', [KlantController::class, 'FAQ']);
route::get('/soliciteren', [KlantController::class, 'soliciteren']);
route::get('/pizzaDashboard', [KlantController::class, 'pizzaDashboard']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::resource('klant', KlantController::class);
require __DIR__.'/auth.php';
