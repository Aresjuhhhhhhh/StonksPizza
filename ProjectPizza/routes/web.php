<?php

use App\Http\Controllers\MedewerkerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\KlantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
});

Route::middleware(['auth', 'role:medewerker'])->group(function () {
    Route::get('/medewerker', [MedewerkerController::class, 'index'])->name('medewerker.index');
});

Route::middleware(['auth', 'role:klant'])->group(function () {
    Route::get('/klant', [KlantController::class, 'index'])->name('klant.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
