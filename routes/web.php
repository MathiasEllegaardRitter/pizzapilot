<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BreakesController;
use App\Http\Controllers\ProductController;


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

Route::get('/breakes', [BreakesController::class, 'readAll']);
Route::post('/breakes', [BreakesController::class, 'create'])->name('breakes.create');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'readAll']);
Route::post('/products', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/find', [ProductController::class, 'get'])->name('products.findProduct');
Route::post('/products/update', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/delete', [ProductController::class, 'delete'])->name('products.delete');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
