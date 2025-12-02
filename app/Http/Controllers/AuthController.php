<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function register(){
        return view('Auth.register');
    }

    public function log_in(){
        return view('Auth.login');
    }

    public function sign_in(Request $request){
      //check user information
        $validator = validator()->make($request->all(),[
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

      //return error
        if($validator->fails()){

            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();

      //create user
        }else{

            $user = User::Create(
                [
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                ]
            );

          //user login
            Auth::login($user);
          //end login

            return redirect()->route('front.index');
        }
    }

    public function login(Request $request){

        $user = $request->only('email', 'password');

        if(!Auth::attempt($user)){
            return Redirect::route('login')->withInput()->with('error', __('auth.failed'));

        }else{
            return redirect()->route('front.index');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('front.index');
    }
}
