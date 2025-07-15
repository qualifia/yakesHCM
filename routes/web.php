<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DJMController;
use App\Http\Controllers\TMController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


/*Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister'); */

Route::middleware(['auth', 'role:admin,hcm'])->group(function () {
    Route::get('/recruitment', [CheckRole::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('djms', DJMController::class); // CRUD DJM
});

Route::get('/', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionLogin'])->name('actionlogin');
Route::post('/logout', [LoginController::class, 'actionLogout'])->name('logout');

Route::middleware('auth')->get('home', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    \Log::info('User di /home:', ['user' => Auth::user()]);
    return view('home');
})->middleware('auth')->name('home');

Route::get('/employees', [TMController::class, 'index'])->name('employees.index');
Route::get('/employees/{employee}', [TMController::class, 'show'])->name('employees.show');
Route::get('/employees/{id}/edit', [TMController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [TMController::class, 'update'])->name('employees.update');
Route::get('/employees/{id}/download-payslip', [TMController::class, 'downloadPayslip'])->name('employees.downloadPayslip');


Route::resource('employees', TMController::class);


