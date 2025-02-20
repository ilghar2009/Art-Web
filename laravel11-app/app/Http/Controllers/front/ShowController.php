<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function sign_in(){
        return view('auth.sign_in');
    }

    public function login(){
        return view('auth.login');
    }
}
