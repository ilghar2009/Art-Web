<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

        $reaction = $request->type === 'gallery'? 'gallery_id' : 'category_id';

        $validator = validator()->make($request->all(), [
            'text'=> ['required', 'string'],
        ]);

        if($validator->fails()){
            return redirect()->route($request->type)->with('error' , $validator)->withInput();
        }else{

            $user = Auth::user();

            Comment::create([
                'text' => $request->text,
                'created_by'=> $user->user_id,
                $request->type=> $reaction,
                'reply_id' => $request->reply_id??false,
            ]);

            return redirect()->route('show.gallery', $request->gallery_id);

        }
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('comment.index');
    }

    public function accept(Comment $comment){
        $comment->update([
            'accept'=>true,
        ]);

        return redirect()->route('comment.index');
    }
}
