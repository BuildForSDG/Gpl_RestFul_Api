<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\WebAuthController;

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



Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('auth/login');
    });
    Route::get('login', [WebAuthController::class, 'loginRoute'])->name('login');
    Route::post('custom-login', [WebAuthController::class, 'Login'])->name('login.custom');
    Route::get('registration', [WebAuthController::class, 'registrationRoute'])->name('register');
    Route::post('custom-registration', [WebAuthController::class, 'register'])->name('register.custom');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [WebAuthController::class, 'dashboard'])->name('dashboard.welcome');
    Route::get('signout', [WebAuthController::class, 'signOut'])->name('signout');
    Route::get('app', [WebAuthController::class, 'dashboard']);
});
