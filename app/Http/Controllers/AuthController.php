<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate(
            [
            'name' => 'required|min:3|max:40',
            'email'=> 'required|email|unique:users,email',
            'password' => 'required|confirmed' 
         ]
            );

            User::create(
            [
                'name'=> $validated['name'],
                'email'=>$validated['email'],
                'password'=>Hash::make($validated['password']),
            ]
            );
        return redirect()-> route('login')->with('success','Account created successfully');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate(
            [
            'email'=> 'required|email',
            'password' => 'required' 
         ]
            );

        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('movies')->with('success','Logged in succesfully');
        }
        return redirect()-> route('login')->with(['email' => "No matching..."]);
    }

    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success','Logged out');
    }
}
