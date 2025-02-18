<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controller::class, 'index'])->name('home');
Route::get('/sign_in', [Controller::class, 'sign_in'])->name('sign');

Route::post('/back/sign_in', [AuthController::class, 'sign_in'])->name('sign_in');
