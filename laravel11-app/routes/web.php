<?php

use App\Http\Controllers\back\AuthController;
use App\Http\Controllers\front\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShowController::class, 'index'])->name('home');
Route::get('/auth/sign_in/', [ShowController::class, 'sign_in'])->name('sign');
Route::get('/auth/login/', [ShowController::class, 'login'])->name('login');

Route::post('/register/', [AuthController::class, 'register'])->name('register');
Route::post('/log_in/', [AuthController::class, 'log_in'])->name('log_in');
Route::get('/logout/', [AuthController::class, 'logout'])->name('logout');
