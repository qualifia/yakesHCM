<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; /* untuk handle authentication */
use Session; /* mengirim pesan error ke halaman form login */

class LoginController extends Controller
{
    public function login() {
        if (Auth::check()) { /* cek user sudah login atau belom */
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request) {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }

    protected function authenticated(Request $request, $user) {
        return redirect()->route('home');
    }

}