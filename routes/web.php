<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DJMController;
use App\Http\Controllers\TMController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\RecruitmentController;
use App\Http\Controllers\WorkforceController;
use App\Http\Controllers\DashboardController;




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

/* LOGIN */

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');


/* HOME */

Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


/* ROLE */

Route::middleware(['auth', 'role:admin,hcm'])->group(function () {
    Route::get('/recruitment', [CheckRole::class, 'index']);
});


/* LOGIN */

Route::get('/', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionLogin'])->name('actionlogin');
Route::post('/logout', [LoginController::class, 'actionLogout'])->name('logout');



Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');
Route::post('/kehadiran', [KehadiranController::class, 'store'])->name('kehadiran.store');


/* TALENT MANAGEMENT */

Route::get('/employees', [TMController::class, 'index'])->name('employees.index');
Route::get('/employees/{employee}', [TMController::class, 'show'])->name('employees.show');
Route::get('/employees/{employee}/edit', [TMController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [TMController::class, 'update'])->name('employees.update');
Route::get('/employees/payslip/download/{filename}', [TMController::class, 'downloadPayslip'])->name('employees.payslip.download');


/* TRAINING MANAGEMENT */

Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
Route::get('/training/create', [TrainingController::class, 'create'])->name('training.create');
Route::post('/training', [TrainingController::class, 'store'])->name('training.store');
Route::get('training/{id}', [TrainingController::class, 'show'])->name('training.show');
Route::get('/training/{id}/edit', [TrainingController::class, 'edit'])->name('training.edit');
Route::delete('/training/{id}/destroy', [TrainingController::class, 'destroy'])->name('training.destroy');


/* DJM MANAGEMENT */

Route::get('/djm', [DJMController::class, 'index'])->name('djm.index');
Route::get('/djm/create', [DJMController::class, 'create'])->name('djm.create');
Route::post('/djm', [DJMController::class, 'store'])->name('djm.store');
Route::get('/djm/{id}', [DJMController::class, 'show'])->name('djm.show');
Route::get('/djm/{id}/edit', [DJMController::class, 'edit'])->name('djm.edit');
Route::delete('/djm/{id}/destroy', [DJMController::class, 'destroy'])->name('djm.destroy');
Route::post('/djm/upload', [DJMController::class, 'upload'])->name('djm.upload');
Route::put('/djm/{id}', [DJMController::class, 'update'])->name('djm.update');


/* RECRUITMENT MANAGEMENT */

Route::get('/recruitment', [RecruitmentController::class, 'index'])->name('recruitment.index');
Route::get('/recruitment/create', [RecruitmentController::class, 'create'])->name('recruitment.create');
Route::get('/recruitment/{id}', [RecruitmentController::class, 'show'])->name('recruitment.show');


/* DASHBOARD OUTSOURCE */

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});


/* WORKFORCE PERFORMANCE */

Route::get('/workforce', [WorkforceController::class, 'index'])->name('workforce.index');
