<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(){
        return view('Auth.register');
    }

    public function log_in(){
        return view('Auth.login');
    }

    public function sign_in(Request $request){

        $validator = validator()->make($request->all(),[
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($validator->errors()->messages()){

            $errors = $validator->errors();

            return redirect()->route('register')->withErrors($errors);

        }else{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);
            dd(session()->all());
            //return redirect()->route('front.index');
        }
    }

    public function login(Request $request){

        $user = $request->only('email', 'password');

        if(!Auth::attempt($user)){
            return response()->json(['error' => 'Unauthorized']);

        }else{
            return redirect()->route('front.index');
        }
    }
}
