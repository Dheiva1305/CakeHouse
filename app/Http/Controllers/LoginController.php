<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\Validat;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    public function login(){
        return view('backend.auth.login');
    }

    public function store(Request $request){
        $credentials = $request->only('email', 'password'); 

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/admin');
        } else {
            return redirect()->back()->withInput()->withErrors(['loginError' => 'Invalid credentials']);
        }
    }
}