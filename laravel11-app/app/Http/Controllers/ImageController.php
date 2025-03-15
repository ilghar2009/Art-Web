<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    // images of gallery

    public function show_gallery_image($id){
        $images = Image::where('gallery_id', $id)->get();
        return view('back.gallery.image.index', compact('images'));
    }

    public function create_gallery_image(){
        $galleries = Gallery::all();

        return view('back.gallery.image.create', compact('galleries'));
    }

    public function store_gallery_image(Request $request){

        $validator = validator()->make($request->all(),[
            'image' => ['required', 'image', 'max:1024', 'mimes:jpeg,png,jpg,svg,webp', 'min:1'],
        ]);

        if($validator->fails()){
            return redirect()->route('gallery.create.image')
                ->withErrors($validator)
                ->withInput();

        }else
        {

            $file = $request->image;
            $filename = $file->getClientOriginalName();

            Storage::disk('public')->put('img/' . $filename, file_get_contents($file));

            $fileUrl = Storage::disk('public')->url('img/' . $filename);


            $check = Image::where('gallery_id', $request->gallery_id)
                ->where('role', true)->first();

            if($check and $request->role){
                $check->role = false;
                $check->save();
            }

            Image::create([
                'image' => '/storage/img/'.$filename??null,
                'gallery_id' => $request->gallery_id??null,
                'role' => $request->role??false,
            ]);

            return redirect()->route('gallery.index');

        }
    }

    public function edit_gallery_image(Image $image)
    {
        $galleries = Gallery::all();
        return view('back.gallery.image.edit', compact('galleries', 'image'));
    }

    public function update_gallery_image(Request $request, Image $image){

        $validator = validator()->make($request->all(),[
            'role'=> ['required', 'boolean'],
            'gallery_id'=> ['required'],
        ]);

        if($validator->fails()){
            dd($image->id);
            //return redirect()->route('gallery.edit.image', $image->id)->withErrors($validator)->withInput();
        }

        $check_image = Image::where('gallery_id' , $request->gallery_id)
            ->where('role' , true)->first();

        if($check_image && $request->role ){
            $check_image->update([
                'role' => false,
            ]);
        }

        $image->update([
            'gallery_id' => $request->gallery_id??$image->gallery_id,
            'role' => $request->role??false,
        ]);

        return redirect()->route('gallery.index');
    }

    public function destroy_gallery_image(Image $image){
        $image->delete();
        return redirect()->route("gallery.index");
    }
}
