<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isNull;

class LikeController extends Controller
{
    public function like(Request $request,$id){

        $set = null;
        $ip = $request->ip();

        if(Auth::check()){
            $user =  Auth::user();

            $set = Like::where('user_id', $user->user_id)->where('gallery_id', $id)->first();
        }else{
            $set = Like::where('user_ip', $ip)->where('gallery_id', $id)->first();
        }

        if(isset($set)) {
            $set->update(['quantity' => $set->quantity += 1]);
        }else
            Like::create([
                'user_id'=> $user->user_id??0,
                'gallery_id' => $id,
            ]);

        return redirect()->route('front.index');
    }
}
