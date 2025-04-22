<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $validate = validator()->make($request->all(), [
            'password' => ['sometimes','nullable', 'string', 'min:8'],
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->user_id, 'user_id')
            ],

            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png', 'max:2048']

            ]);

        if($validate->fails()){
            return redirect()->route('front.dashboard')
                ->withErrors($validate)
                ->withInput();
        }
        else{

            if ($request->hasfile('image')) {
                $file = $request->image;
                $filename = $file->getClientOriginalName();

                Storage::disk('public')
                    ->put('img/' . $filename, file_get_contents($file));

                $fileUrl = Storage::disk('public')
                    ->url('img/' . $filename);
            }
            else {
                $filename = null;
            }

            $user->update([
               'name' => $request->name,
               'email' => $request->email,
            ]);

            if($request->password !== null)
                $user->password = Hash::make($request->password);

            $user->image = $filename ? '/storage/img/' . $filename : $user->image;

            $user->save();

            return redirect()->route('front.dashboard');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
