<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public funcition login() {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request) {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');
        }
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }

}
