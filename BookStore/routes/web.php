<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::middleware('auth.basic')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('auth')->middleware('guest')->group(function () {
    // Register
    Route::view('register', 'auth.register')->name('register.get');
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
    // Login
    Route::view('login', 'auth.login')->name('login.get');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    // Email verification + generate OTP
    Route::view('reset-password', 'auth.reset-password-request')->name('reset-password.get');
    Route::post('reset-password', [AuthController::class, 'requestResetPassword'])->name('reset-password.post');
    // Check OTP
    Route::view('reset-password/check-otp', 'auth.reset-password-submit-otp')->name('reset-password-check-otp.get');
    Route::post('reset-password/check-otp', [AuthController::class, 'resetPasswordCheckOTP'])->name('reset-password-check-otp.post');
    // Update password
    Route::view('reset-password/update-password', 'auth.reset-password-update-password')->name('reset-password-update-password.get');
    Route::post('reset-password/update-password', [AuthController::class, 'resetPasswordUpdate'])->name('reset-password-update-password.post');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'getCart'])->name('getCart');
    Route::post('add', [CartController::class, 'addCart'])->name('addCart');
    Route::post('remove', [CartController::class, 'removeCart'])->name('removeCart');
    Route::post('update', [CartController::class, 'updateCart'])->name('updateCart');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book/{bookId}', [BookController::class, 'getBookDetails'])->name('getBookDetails');
