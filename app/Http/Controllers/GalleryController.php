<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(){
        $galleries = Gallery::all();

        return view('back.gallery.index', compact('galleries'));
    }

    public function create(){
        $categories = Category::all();
        return view('back.gallery.create', compact('categories'));
    }

    public function store(Request $request){

            $validator = validator()->make($request->all(),[
               'title'=> ['required', 'string', 'unique:galleries'],
                'description'=> ['required', 'string', 'min:3'],
                'category_id'=> ['required', 'exists:categories,category_id'],
            ]);

            if($validator->fails()){
                return redirect()->route('gallery.create')->withErrors($validator)->withInput();
            }

        Gallery::create([
            'title' => $request->title??null,
            'description' => $request->description??null,
            'created_by' => Auth::user()->user_id,
            'category_id' => $request->category_id??null,
        ]);

        return redirect()->route('gallery.index');
    }

    public function edit(Gallery $gallery){
        $categories = Category::all();
        return view('back.gallery.edit', compact('gallery', 'categories'));
    }

    public function update(Request $request, Gallery $gallery){

        $validator = validator()->make($request->all(),[
            'title'=> ['required', 'string'],
            'description'=> ['required', 'string', 'min:3'],
            'category_id'=> ['required', 'exists:categories,category_id'],
        ]);

        if($validator->fails()){
            return redirect()->route('gallery.edit',$gallery->gallery_id)->withErrors($validator)->withInput();
        }


        $gallery->update([
            'title' => $request->title??null,
            'description' => $request->description??null,
            'category_id' => $request->category_id??0,
        ]);

        return Redirect::route('gallery.index');
    }

    public function destroy(Gallery $gallery){
        $gallery->delete();
        return Redirect::route('gallery.index');
    }

}
