<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;

class BackshowController extends Controller
{
    public function index(){
        $users = User::where('role', true)->get();
        return view('back.index', compact('users'));
    }
}
