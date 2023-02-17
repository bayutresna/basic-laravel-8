<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function create(){
        return view('Auth.register');
    }

    public function store(){
        $request = request()->validate([
            'name' => ['required', 'max:255','min:4'],
            'username' => ['required','max:255','min:3','unique:users,username'],
            'email' => ['required', 'email', 'max:255','unique:users,email'],
            'password' => ['required','max:255','min:7']
        ]);

        $user = User::create($request);

        auth()->login($user);
        
        return redirect('/')->with('success', 'your account has been created');
    }

    public function login(){
        return view('Auth.login');
    }

    public function logging(){

        $request = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        //attempt to authenticate the user and login using $request as credential
        if( !auth()->attempt($request)){

            return back()
            ->withInput()
            ->withErrors(['email' => 'your email was not registered']);

        }
            // session fixation
            session()->regenerate();

            // redirect with flash message if attempt success
            return redirect('/')->with('success','Welcome Back');
        
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('success', 'you are logged out');

    }
}
