<?php

use App\Http\Controllers\back\AuthController;
use App\Http\Controllers\front\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShowController::class, 'index'])->name('home');
Route::get('/register/', [ShowController::class, 'sign_in'])->name('sign');
Route::get('/login/', [ShowController::class, 'login'])->name('login');

Route::group([], function(){
    Route::post('/register/', [AuthController::class, 'register'])->name('register');
    Route::post('/login/', [AuthController::class, 'log_in'])->name('log_in');
    Route::get('/logout/', [AuthController::class, 'logout'])->name('logout');
});
