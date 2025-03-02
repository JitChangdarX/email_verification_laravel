<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/login-with-otp','auth.loginwithotp')->name('login-with-otp');
Route::post('/login-with-otp-post',[App\Http\Controllers\otpcontroller::class, 'loginwithotppost'])->name('login.with.otp.post');
Route::view('/confirm-login-with-otp','auth.confirmloginwithotp')->name('confirm.login.with.otp');


