<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function sign_in(Request $request){

        $validate = validator()->make($request->all(), [
           'name' => ['required', 'string', 'min:3', 'max:20'],
           'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           'password' => ['required', 'string', 'min:8',],
        ]);

        if($validate->errors()->messages()){
            dd(
                redirect()->back()->withErrors(['result', '201'])
            );
        }else
            $request->password = Hash::make($request->password);

        $user = User::create($request->all());

    }
}
