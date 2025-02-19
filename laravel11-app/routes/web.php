<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShowController::class, 'index'])->name('home');
Route::get('/sign_in', [ShowController::class, 'sign_in'])->name('sign');
Route::get('/login', [ShowController::class, 'login'])->name('login');

Route::post('/register/', [AuthController::class, 'register'])->name('register');
