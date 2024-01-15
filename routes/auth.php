<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


// change '/home' at Providers/RouteServiceProvider
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login']);

    Route::post('/login', [AuthController::class, 'auth_check'])->name('login');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

//add             Route::middleware('auth')
// ->group(base_path('routes/auth.php'));

//inside Providers/RouteServiceProvider
