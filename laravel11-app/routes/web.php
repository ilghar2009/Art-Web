<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\back\BackshowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClearController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\front\ShowController;

use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Models\Comment;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Support\Facades\Route;

//front
Route::group([], function(){
    Route::get('/', [ShowController::class, 'index'])->name('front.index');
    Route::get('/like/gallery/{id}',[LikeController::class, 'like'])->name('like');
});

//all route need to login
Route::middleware(['Auth'])->group(function(){

    //comment user
    Route::post('/comment/create/', [CommentController::class, 'store'])->name('comment.store');

    //backend
    Route::middleware(['Admin'])->group(function() {
        Route::get('/back/dashboard/', [BackshowController::class, 'index'])->name('back.index');

        //category
        Route::get('/back/dashboard/category/', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/back/dashboard/category/create/', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/back/dashboard/category/store/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/back/dashboard/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/back/dashboard/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/back/dashboard/category/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        //gallery
        Route::get('/back/dashboard/gallery/', [GalleryController::class, 'index'])->name('gallery.index');
        Route::get('/back/dashboard/gallery/create/', [GalleryController::class, 'create'])->name('gallery.create');
        Route::post('/back/dashboard/gallery/store/', [GalleryController::class, 'store'])->name('gallery.store');
        Route::get('/back/dashboard/gallery/edit/{gallery}', [GalleryController::class, 'edit'])->name('gallery.edit');
        Route::post('/back/dashboard/gallery/update/{gallery}', [GalleryController::class, 'update'])->name('gallery.update');
        Route::get('/back/dashboard/gallery/delete/{gallery}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        //image
        Route::get('/back/dashboard/gallery/image/show/{id}', [ImageController::class, 'show_gallery_image'])->name('gallery.show.image');
        Route::post('/back/dashboard/gallery/image/create/', [ImageController::class, 'store_gallery_image'])->name('gallery.store.image');
        Route::get('/back/dashboard/gallery/image/create/', [ImageController::class, 'create_gallery_image'])->name('gallery.create.image');
        Route::get('/back/dashboard/gallery/image/edit/{image}', [ImageController::class, 'edit_gallery_image'])->name('gallery.edit.image');
        Route::post('/back/dashboard/gallery/image/update/{image}', [ImageController::class, 'update_gallery_image'])->name('gallery.update.image');
        Route::get('/back/dashboard/gallery/image/destroy/{image}', [ImageController::class, 'destroy_gallery_image'])->name('gallery.destroy.image');

        //comment
        Route::get('/comment/delete/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
        Route::get('/comment/update/{comment}', [CommentController::class, 'accept'])->name('comment.accept');
        Route::get('/comment/show/', [CommentController::class, 'index'])->name('comment.index');

        //clear
        Route::get('clear/index/',[ClearController::class, 'index'])->name('clear.index');
    });

});


//Auth group
    Route::group([], function(){

    //Auth
            Route::get('/auth/login/', [AuthController::class, 'log_in'])->name('login');
            Route::get('/auth/register/', [AuthController::class, 'register'])->name('register');

            Route::group([AuthenticateSession::class], function(){
                Route::post('/back/auth/login/', [AuthController::class, 'login'])->name('back.login');
                Route::post('/back/auth/register/', [AuthController::class, 'sign_in'])->name('back.register');
            });
    //end Auth

    //logout
        Route::get('/auth/logout/',  [AuthController::class, 'logout'])->name('logout');
    });

    //show
    Route::group([], function() {
        Route::get('/show/gallery/{gallery}', [ShowController::class, 'gallery_show'])->name('show.gallery');
        Route::get('/show/category/{category}', [ShowController::class, 'category_show'])->name('show.category');
    });