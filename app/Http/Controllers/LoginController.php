<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  Illuminate\Support\Facades\Session;



class LoginController extends Controller
{
    public function login(){
        if (Auth::check()) { /* cek user sudah login atau belom */
            return redirect('home');
        }
        return view('login');
    } 

    public function actionlogin(Request $request) {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return view(view: 'home');
        }
        
        Session::flash('error', 'Email atau Password Salah.');
        $request->session()->regenerate();
        return redirect('/');
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }

    protected function authenticated(Request $request, $user) {
        return redirect()->route('home');
    }

    public function username() {
        return 'username';
    }
}