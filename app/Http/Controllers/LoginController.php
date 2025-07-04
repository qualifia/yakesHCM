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
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/');
        }
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }

    protected function autheticated(Request $request, $user) {
        if ($user->hasrole('admin')) {
            return redirect('/admin/dashboard1');
        } elseif ($user->hasRole('hcm')) {
            return redirect('/hcm/dashboard2');
        } elseif ($user->hasRole('employee')) {
            return redirect('/employee/dashboard3');
        } elseif ($user->hasRole('guest')) {
            return redirect('/guest/dashboard4');
        }    
        return redirect('/home');
    }

}
