<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;

class ShowController extends Controller
{
    public function index(){

        $categories = Category::orderBy('created_at','asc')->take(5)->get();

        return view('index',compact('categories'));
    }

    public function category_show(Category $category){

    }
}
