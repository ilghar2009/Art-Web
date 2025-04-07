<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Like;
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

                if($type == 'Gallery::class')
                    $check = Gallery::where('gallery_id', $comment->gallery_id)->first();
                else
                    $check = Category::where('category_id', $comment->category_id)->first();

                if(!$check) {
                    $comment->delete();
                }
            }

        $likes = Like::all();

            foreach($likes as $like){
                $check = Gallery::where('gallery_id', $like->gallery_id)->first();

                if(!$check) {
                    $like->delete();
                }
            }

        return redirect()->route('back.index');
    }
}
