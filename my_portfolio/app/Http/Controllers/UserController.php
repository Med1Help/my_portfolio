<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(Request $req){
        $formFields = $req->validate([
            'email'      =>['required','email'],
            'ful_name'   =>'required',
            'password'   =>'required',
         ]);
         $formFields['password'] = bcrypt($formFields['password']);
         $formFields['role'] = "USER";
         $user = User::create($formFields);
         auth()->login($user);
         return redirect('/')->with("message","User Created and logged in");
    }

    public function logout(Request $req){
        auth()->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/')->with("message","You logged out");
    }
    public function login(Request $req){
        $formFields = $req->validate([
            'email'      =>['required','email'],
            'password'   =>'required',
         ]);
        if(auth()->attempt($formFields)){
            $req->session()->regenerateToken();
            return redirect('/')->with("message","You are now logged in");
        } 
        return back()->withErrors(["email" => "your credentials are wrong"])->onlyInput('email');
    }
}
