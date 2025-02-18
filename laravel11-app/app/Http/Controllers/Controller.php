<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function home(){
        return view('front.index');
    }

    public function sign_in(){
        return view('signin');
    }
}
