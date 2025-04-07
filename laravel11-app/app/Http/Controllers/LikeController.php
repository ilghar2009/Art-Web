<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use function PHPUnit\Framework\isNull;

class LikeController extends Controller
{
    public function like(Request $request,$id){

        $set = null;
        $ip = $request->ip();

        if(Auth::check()){
            $user =  Auth::user();

            $set = Like::where('user_id', $user->user_id)->where('gallery_id', $id)->where('ip', $ip)->first();
        }else{
            $set = Like::where('ip', $ip)->where('gallery_id', $id)->first();
        }

        if(!isset($set))
            Like::create([
                'user_id' => $user->user_id ?? 0,
                'gallery_id' => $id,
                'ip' => $ip,
            ]);
        else {
            $errors = ['error'=> 'شما قبلا این گالری را لایک کرده اید', 'gallery_id' => $id];

            return Redirect::back()->with('error', $errors);
        }

            $errors = ['error'=> 'شما این گالری را پسندیده اید.', 'gallery_id' => $id];

        return Redirect::back()->with('error', $errors);
    }
}
