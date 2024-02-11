<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate(
            [
                'name' => 'min:3|max:40|required',
                'email' => 'email|required|unique:users,email',
                'password' => 'confirmed|required'
            ]
        );


        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('dashboard.searchIndex')->with('success', 'Account registered succesfully');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate(
            [
                'email' => 'email|required',
                'password' => 'required'
            ]
        );

        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('dashboard.index')->with('success', 'Logged in successfully');
        }

        return redirect()->route('login')->withErrors([
            'dataCheck' => 'email and password does not match any data'
        ]);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard.index')->with('success', 'Logged out successfully');
    }
}
