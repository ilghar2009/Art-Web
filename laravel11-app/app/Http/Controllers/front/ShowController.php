<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Gallery;

class ShowController extends Controller
{
    public function index(){

        $galleries = Gallery::orderBy('created_at', 'asc')->take(5)->get();
        $categories = Category::orderBy('created_at','asc')->take(5)->get();

        return view('index',compact('categories', 'galleries'));
    }

    public function category_show(Category $category){

    }

    public function gallery_show(Gallery $gallery){

    }
}
