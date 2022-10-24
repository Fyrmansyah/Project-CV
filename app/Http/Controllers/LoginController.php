<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use app\Models\User;
class LoginController extends Controller
{
    public function login(){
        return view('login.login');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
     
        return redirect('/login');
    }

    public function auth(Request $request){
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/mdash');
        }
 
        return back()->withErrors([
            'email' => 'Email atau Password salah',
        ]);
    }
}