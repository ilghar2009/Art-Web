<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function register(Request $request){

        $validate = validator()->make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validate->errors()->messages()){
            return Redirect::back()->withErrors($validate->errors())->withInput();

        }else {

            $request->password = Hash::make($request->password);

        //role 0 is admin && role 1 is client/user

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 1,
            ]);

            Auth::login($user);

            return route('home');
        }
    }

    public function log_in(Request $request){

    }

    public function logout(){
        Auth::logout();
        return Redirect::route('home');
    }
}
