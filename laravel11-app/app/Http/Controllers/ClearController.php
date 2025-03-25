<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;

class ClearController extends Controller
{
    public function index(){
        $images = Image::all();

            foreach($images as $image){
                $check = Gallery::where('gallery_id', $image->gallery_id)->first();

                if(!$check) {
                        $imagePath = public_path($image->image);

                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $image->delete();
                }
            }

        $comments = Comment::all();

            foreach($comments as $comment){
                $type = $comment->type;

                if($type == 'gallery')
                    $check = Gallery::where('gallery_id', $comment->gallery_id)->first();
                else
                    $check = Category::where('category_id', $comment->category_id)->first();

                if(!$check) {
                    $comment->delete();
                }
            }

        return redirect()->route('back.index');
    }
}
