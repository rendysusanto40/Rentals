<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view("register");
    }

    public function store(Request $request){
        $validateField = $request->validate([
            'name' => "required|min:3|max:48",
            'email' => "required|email|unique:users,email,except,id",
            'password' => "required|confirmed|min:8",
            'address' => "required|min:10",
            'phone-number' => "required|min:10|max:13|regex:/08[0-9]{9,}/|unique:users,phone-number,except,id",
            'dob' => "required|date|before:-17 years"
        ]);
        User::create([
            "name" => $validateField["name"],
            "email" => $validateField["email"],
            "password" => bcrypt($validateField["password"]),
            "address" =>$validateField["address"],
            "phone-number" => $validateField["phone-number"],
            "dob" => $validateField["dob"]
        ]);
        return redirect(route("auth.login"));
    }
    public function login(){
        return view("login");
    }
    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return back();
    }
    public function authenticate(Request $request){
        $validateField = $request->validate([
            'email' => "required|email",
            'password' => "required|min:8",
        ]);

        if(auth()->attempt($validateField)){
            $request->session()->regenerate();
        }

        return redirect(route("home"));
    }
}
