<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

//front
Route::group([], function(){
    Route::get('/', [ShowController::class, 'index'])->name('front.index');
});

//back
Route::group([], function(){

});
