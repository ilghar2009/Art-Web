<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function index(){
        return view('front.index');
    }

    public function sign_in(){
        return view('signin');
    }

    public function login(){
        return view('login');
    }
}
