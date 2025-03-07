<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::all();
        return view('back.gallery.index', compact('galleries'));
    }

    public function create(){
        return view('back.gallery.create');
    }

    public function store(Request $request){

    }
}
