<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FavoriteController;

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

Route::view('/', 'index');

Route::view('/message', 'message');

Route::view('/cart', 'cart');

Route::view('/favorites', 'favorites');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::view('/register','register')->name('register');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

    Route::post('/login', [AuthenticatedSessionController::class, "store"])
    ->name("login");



    // Route::get('/product-checkout', function (Request $request) {
    //     return $request->user()->checkout(['price_tshirt' => 1], [
    //     'success_url' => route('your-success-route'),
    //     'cancel_url' => route('your-cancel-route'),
    //     ]);
      
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // Your other authenticated routes here
    
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::post('/toggle-favorite/{productId}', [FavoriteController::class, 'toggleFavorite'])->name('toggle.favorite');
        Route::get('/favorites', [FavoriteController::class, 'viewFavorites'])->name('favorites.index');
    });


require __DIR__.'/auth.php';
