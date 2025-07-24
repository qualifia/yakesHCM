<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DJMController;
use App\Http\Controllers\TMController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TrainingController;



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
Route::get('/employees/payslip/download/{filename}', [TMController::class, 'downloadPayslip'])->name('employees.payslip.download');

Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');


Route::middleware('auth')->get('home', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    \Log::info('User di /home:', ['user' => Auth::user()]);
    return view('home');
})->middleware('auth')->name('home');

Route::get('/employees', [TMController::class, 'index'])->name('employees.index');

/*
Route::get('/employees/{employee}', [TMController::class, 'show'])->name('employees.show');
Route::get('/employees/{id}/edit', [TMController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [TMController::class, 'update'])->name('employees.update');
Route::get('/employees/{id}/download-payslip', [TMController::class, 'downloadPayslip'])->name('employees.downloadPayslip');
*/

Route::get('/employees', [TMController::class, 'index'])->name('employees.index');
Route::get('/employees/{employee}', [TMController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [TMController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [TMController::class, 'update'])->name('employees.update');


/* Route::resource('employees', TMController::class); */


Route::get('/training', [TrainingController::class, 'index'])->name('training.index');



Route::get('/djm', [DJMController::class, 'index'])->name('djm.index');
Route::get('/djm/create', [DJMController::class, 'create'])->name('djm.create');
Route::get('/djm/export_excel', [DJMController::class, 'exportExcel'])->name('djm.export_excel');
Route::post('/djm', [DJMController::class, 'store'])->name('djm.store');
Route::get('/djm/{id}', [DJMController::class, 'show'])->name('djm.show');
Route::get('/djm/{id}/edit', [DJMController::class, 'edit'])->name('djm.edit');
Route::get('/djm/{id}/destroy', [DJMController::class, 'destroy'])->name('djm.destroy');

/*
Route::resource('djm', DJMController::class);
Route::get('/djm/export_excel', [DJMController::class, 'exportExcel'])->name('djm.export_excel');
*/