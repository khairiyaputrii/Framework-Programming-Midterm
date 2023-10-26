<?php

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/registered_items', 'ItemsController@index')->name('registered_items');
    Route::get('/registered_items/{id}/edit', 'ItemsController@edit'); // Edit a specific item
    Route::put('/registered_items/{id}', 'ItemsController@update'); // Update a specific item
    Route::delete('/registered_items/{id}', 'ItemsController@destroy'); // Delete a specific item
});




require __DIR__.'/auth.php';
