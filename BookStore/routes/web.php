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
    Route::get('/', [AuthController::class, 'index']);
    Route::get('logout', [AuthController::class, 'logout']);
});

Route::prefix('auth')->group(function () {
    Route::get('register', function () {
        return view('auth.register');
    });
    Route::post('register', [AuthController::class, 'register']);
    Route::get('login', function () {
        return view('auth.login');
    });
    Route::post('authenticate', [AuthController::class, 'login']);
    // Email verification + generate OTP
    Route::get('/reset-password', function () {
        return view('auth.request-reset-password');
    });
    Route::post('/reset-password', [AuthController::class, 'requestResetPassword']);
    // Check OTP
    Route::get('/reset-password/check-otp', function () {
        return view('auth.reset-password-check-otp');
    });
    Route::post('/reset-password/check-otp', [AuthController::class, 'resetPasswordCheckOTP']);
    // Update password
    Route::get('/reset-password/update-password', function () {
        return view('auth.reset-password-update');
    });
    Route::post('/reset-password/update-password', [AuthController::class, 'resetPasswordUpdate']);
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'getCart'])->name('getCart');
    Route::post('add', [CartController::class, 'addCart'])->name('addCart');
    Route::post('remove', [CartController::class, 'removeCart'])->name('removeCart');
    Route::post('update', [CartController::class, 'updateCart'])->name('updateCart');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book/{bookId}', [BookController::class, 'getBookDetails'])->name('getBookDetails');
