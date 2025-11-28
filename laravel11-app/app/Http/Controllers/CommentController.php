<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(){
        $comments = Comment::all();
        return view('back.comment.index', compact('comments'));
    }

    public function store(Request $request){

        $comment = [];

    //check commentable_type and set this route
        $show = $request->type == 'gallery'? 'show.gallery' : 'show.category';
        $model = $request->type == 'gallery'? Gallery::class : Category::class;

       //check comment

            $validator = validator()->make($request->all(), [
                'text'=> ['required', 'string'],
            ]);

            $check = Comment::where('created_by', Auth::user()->user_id)
                ->where('text', $request->text)
                ->where('commentable_id', $request->id)->first();

            if($validator->fails() or $check){
                return redirect()->route($show,$request->id)->with('error' , $validator)->withInput();
            }

    //if comment not exist and user login => create comments

        else{

            $user = Auth::user();


            Comment::create([
                'text' => $request->text,
                'created_by'=> $user->user_id,
                'commentable_id'=> $request->id,
                'commentable_type' => $model,
                'reply_id' => $request->reply_id??false,
                'status' => false,
            ]);

            return redirect()->route($show, $request->id);

        }
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('comment.index');
    }

    public function accept(Comment $comment){
        $comment->update([
            'status'=>true,
        ]);

        return redirect()->route('comment.index');
    }

    public function show(){
        $user = Auth::user();

        $comments = Comment::where('reply_id', $user->user_id)->where('created_by', $user->user_id)->get();

        return view('front.dashboard', compact('comments'));
    }
}
