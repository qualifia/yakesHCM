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
            return redirect()->intended(route('home'));
        }

        \Log::info('Login gagal:', $credentials); // Tambahkan log debug
            $request->session()->regenerate(); // ✅ Penting: simpan session login
            return view(view: 'home');
            //return redirect()->intended('home'); // ✅ Redirect ke home
        }
        Session::flash('error', 'Email atau Password Salah');
        return redirect('/');
    }
    


    public function actionlogout() {
       Auth::logout();
        request()->session()->invalidate();      // ✅ Tambahan untuk keamanan
        request()->session()->regenerateToken(); // ✅ Regenerate CSRF token
        return redirect('/');
    }

    protected function authenticated(Request $request, $user) {
        return redirect()->route('home');
    }
}