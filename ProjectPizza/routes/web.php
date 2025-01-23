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
use App\Http\Controllers\BezorgerController;

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

    // medewerker Routes
    Route::get('/medewerker', [MedewerkerController::class, 'index'])->name('medewerker.index');
    Route::get('/werknemers/show/{order}', [MedewerkerController::class, 'show'])->name('werknemers.show');
    Route::get('/werknemers/pizzaToevoegen', [MedewerkerController::class, 'pizzaToevoegenIndex'])->name('werknemers.pizzaToevoegenIndex');
    Route::post('/werknemers/pizzaToevoegen', [MedewerkerController::class, 'pizzaToevoegen'])->name('werknemers.pizzaToevoegen');
    Route::get('/werknemers/showPizzas', [MedewerkerController::class, 'showPizzas'])->name('werknemers.showPizzas');
    Route::put('/werknemers/update/{order}', [MedewerkerController::class, 'update'])->name('werknemers.update');
    Route::delete('/werknemers/orders/{order}', [MedewerkerController::class, 'destroy'])->name('werknemers.destroy');
    Route::get('/werknemers/ingredientenIndex', [MedewerkerController::class, 'ingredientenIndex'])->name('werknemers.ingredientenIndex');
    Route::get('/werknemers/createIngredienten', [MedewerkerController::class, 'createIngredienten'])->name('werknemers.createIngredienten');
    Route::post('/werknemers/ingredientToevoegenInDb', [MedewerkerController::class, 'ingredientToevoegenInDb'])->name('werknemers.ingredientToevoegenInDb');
    Route::get('/pizza/edit/{id}', [MedewerkerController::class, 'pizzaEdit'])->name('werknemers.pizzaEdit');
    Route::put('/werknemers/ingredient/{id}', [MedewerkerController::class, 'EditIngredient'])->name('werknemers.ingredientEdit');
    Route::get('/ingredient/edit/{id}', [MedewerkerController::class, 'ingredientEditIndex'])->name('werknemers.ingredientEditIndex');
    Route::put('/pizza/{id}', [MedewerkerController::class, 'pizzaUpdate'])->name('pizza.pizzaUpdate');
    Route::delete('/pizza/{id}', [MedewerkerController::class, 'pizzaDelete'])->name('pizza.destroy');
    Route::delete('/ingredient/{id}', [MedewerkerController::class, 'ingredientVerwijderenVanDb'])->name('werknemers.ingredientVerwijderenVanDb');
    Route::post('pizza/{id}/ingredienten', [MedewerkerController::class, 'ingredientToevoegen'])->name('pizza.ingredientToevoegen');
    Route::delete('pizza/{pizza}/ingredienten/{ingredient}', [MedewerkerController::class, 'ingredientVerwijderen'])->name('pizza.ingredientVerwijderen');


    //Manager Routes
    Route::get('/manager', [ManagerController::class, 'index'])->name('manager.index');
    Route::get('/manager/show/{id}', [ManagerController::class, 'show'])->name('manager.show');
    Route::get('/manager/edit/{id}', [ManagerController::class, 'edit'])->name('manager.edit');
    Route::delete('/manager/destroy/{id}', [ManagerController::class, 'destroy'])->name('manager.destroy');
    Route::put('/manager/update/{id}', [ManagerController::class, 'update'])->name('manager.update');
    Route::get('/manager/create', [ManagerController::class, 'create'])->name('manager.create');
    Route::post('/manager/store', [ManagerController::class, 'store'])->name('manager.store');

    //bezorger routes
    Route::get('/bezorger', [BezorgerController::class, 'index'])->name('bezorger.index');
    Route::put('/bezorger/update/{order}', [BezorgerController::class, 'update'])->name('bezorger.update');
});


require __DIR__ . '/auth.php';
