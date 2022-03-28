<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }


    public function index(){
        if(Auth::user()->role == 'admin'){
            return view('admin.dashboard');
        }
        elseif(Auth::user()->role == 'petugas'){
            return view('petugas.dashboard');
        }
    }

    public function logout(Request $request){   
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('succses', 'Berhasil Log-out');
    }
}
