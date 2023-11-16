<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

    Route::post('/login', [AuthenticatedSessionController::class, "store"])
    ->name("login");


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
        // Your other authenticated routes here
    
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });



require __DIR__.'/auth.php';
