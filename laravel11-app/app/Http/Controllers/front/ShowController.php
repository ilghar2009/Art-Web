<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Image;

class ShowController extends Controller
{
    public function index(){

        $galleries = Gallery::orderBy('created_at', 'asc')->take(5)->get();
        $categories = Category::orderBy('created_at','asc')->take(5)->get();

        return view('front.index',compact('categories', 'galleries'));
    }

    public function category_show(Category $category){

        $category->load(['comments']);

        $publicComments = $category->comments()->orderBy('status', True)->map(fn($comment) => [
            'id' => $comment->id,
            'text' => $comment->text,
            'user_id' => $comment->created_by,
            'name' => $comment->user->name,
            'reply' => Comment::where('id', $comment->reply_id)->get()->map(fn($comment) => [
                'id' => $comment->id,
                'name' => $comment->user->name,
            ])
        ]);

        return view('front.show.category_show', [
           'id' => $category->category_id,
           'title' => $category->title,
           'image' => $category->image,
           'description' => $category->description,
           'comments' => $publicComments,
        ]);
    }

    public function gallery_show(Gallery $gallery){

        $gallery->load(['comments', 'category', 'user']);

        $publicComments = $gallery?->comments->where('status', true)->map(fn($comment) => [
            'id' => $comment->id,
            'text' => $comment->text,
            'user_id' => $comment->created_by,
            'name' => $comment->user->name,
            'reply' => Comment::where('id', $comment->reply_id)->get()->map(fn($comment) => [
                'id' => $comment->id,
                'name' => $comment->user->name,
            ]),
        ]);

        $image = Image::where('gallery_id', $gallery->gallery_id)->get()->map(fn($image) => [
            'id' => $image->id,
            'url' => $image->image,
            'role' => $image->role,
        ]);




        return view('front.show.gallery_show',[

            'id' => $gallery->gallery_id,
            'title' => $gallery?->title,
            'description' => $gallery?->description,
            'category_id' => $gallery->category?->title,
            'user_id' => $gallery->user?->name,

            'images' => $image,

            'comments' => $publicComments,

            'likes_count' => $gallery?->likes_count,

        ]);
    }
}
