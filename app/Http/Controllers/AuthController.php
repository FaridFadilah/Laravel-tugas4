<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller{
    public function register(Request $request){
        if($request->method() == "GET") return view('page.auth.register');
    }

    public function login(Request $request){
        if($request->method() == "GET") return view('page.auth.index');
    }

    public function logout(){
        
    }
}