<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;

class BackshowController extends Controller
{
    public function index(){
        return view('back.index');
    }
}
