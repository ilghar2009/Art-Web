<?php

use App\Http\Controllers\back\BackshowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\front\ShowController;

use Illuminate\Support\Facades\Route;

//front
Route::group([], function(){
    Route::get('/', [ShowController::class, 'index'])->name('front.index');
});

//back
Route::group([], function(){

    Route::get('/back/dashboard/',[BackshowController::class, 'index'])->name('back.index');

    //category
        Route::get('/back/dashboard/category/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/back/dashboard/category/create/', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/back/dashboard/category/store/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/back/dashboard/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/back/dashboard/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/back/dashboard/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/category/show/{category}', [ShowController::class, 'show'])->name('category.show');
});
