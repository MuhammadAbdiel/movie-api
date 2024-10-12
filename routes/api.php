<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(RegisterController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
});

Route::middleware(['auth:sanctum', 'check.token.expiration'])->group(function () {
    Route::resource('movies', MovieController::class)->only(['index', 'store', 'show', 'update', 'destroy'])->names([
        'index' => 'movies.index',
        'store' => 'movies.store',
        'show' => 'movies.show',
        'update' => 'movies.update',
        'destroy' => 'movies.destroy',
    ]);
});
