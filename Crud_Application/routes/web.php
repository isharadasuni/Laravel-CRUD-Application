<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route for displaying the home page with item list
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route for adding an item
Route::post('/add-item', [HomeController::class, 'store'])->name('item.store');

// Route for showing a specific item (view)
Route::get('/items/{id}', [HomeController::class, 'show'])->name('item.show');

// Route for showing the form to edit a specific item (edit)
Route::get('/items/{id}/edit', [HomeController::class, 'edit'])->name('item.edit');

// Route for updating a specific item (update)
Route::put('/items/{id}', [HomeController::class, 'update'])->name('item.update');

// Route for deleting a specific item (delete)
Route::delete('/items/{id}', [HomeController::class, 'destroy'])->name('item.destroy');
