<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     if(Auth::check()){
//             return redirect()->route('dashboard');

//         }
//     return view('registeration');
// });
Route::get('/', [AuthController::class, 'index'])->name('home');


Route::get('/registration', [AuthController::class, 'index'])->name('home');

Route::get('/forgotten-password', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('forgottenPassword');

})->name('forgottenPassword');

Route::get('/otp-code', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('otp');

})->name('otpCode');

Route::get('/new-password', function () {

    if (Auth::check()) 
        return redirect()->route('dashboard');

    return view('newPassword');

})->name('newPassword');



Route::post('/loginprocess', [AuthController::class, 'handle_login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration.process');
Route::post('/forgotten-password', [AuthController::class, 'forgottenPassword'])->name('forgottenPassword.process');
Route::post('/otp-code', [AuthController::class, 'checkOtpCode'])->name('otpCode.process');
Route::post('/new-password', [AuthController::class, 'newPassword'])->name('newPassword.process');
