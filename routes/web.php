<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingController::class, 'index'])->name('index');

Route::get('/admin', [LoginController::class, 'index'])->name('admin');

Route::prefix('/')->group(function () {
    Route::get('/login', function () {
        return redirect()->to('admin');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Password Reset Routes...
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset']);
});

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/wellcome', [DashboardController::class, 'index'])->name('index.wellcome');

        Route::get('/list-job', [JobController::class, 'index'])->name('index.job');
        Route::get('/add-job', [JobController::class, 'add'])->name('add.job');
        Route::post('/add-job', [JobController::class, 'store']);
        Route::delete('/list-job/delete/{id}', [JobController::class, 'destroy'])->name('delete.job');
    });
});

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
