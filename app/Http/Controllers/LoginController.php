<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;



class LoginController extends Controller
{
    public function login() {
        if (Auth::check()) { /* cek user sudah login atau belom */
            return redirect('home');
        }
        return view('login');
    } 

    public function actionlogin(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // wajib agar session aman
            //return redirect()->intended(route('home'));
            return view(view: 'home');
            //return redirect(to: 'home');
        }
            //$request->session()->regenerate(); // penting untuk keamanan
            //return redirect()->intended('home');
        
        Session::flash('error', 'Email atau Password Salah.');
        $request->session()->regenerate(); // ✅ Penting: simpan session login
            //return view(view: 'login');
            //return redirect()->intended('home'); // ✅ Redirect ke home
            //Session::flash('error', 'Email atau Password Salah');
        return redirect('/');
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }

    protected function authenticated(Request $request, $user) {
        return redirect()->route('home');
    }
}