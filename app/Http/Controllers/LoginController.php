<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if (Auth::check()) {
            return redirect()->intended('dashboard');
        }
        return view('login/login');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        $request->session()
        ->flash('message', 'Login gagal, mohon periksa kembali username dan password yang digunakan.');
        $message = $request->session()->get('message',null);
        return redirect('/login')->with('message', $message);
    }
}
