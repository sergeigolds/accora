<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/ads', [AdController::class, 'index'])->name('ads');
Route::get('/ad', [AdController::class, 'single'])->name('single');

// Auth
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


// Only auth users
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::get('/account/post-ad', [AdController::class, 'showAdForm'])->name('post-ad');
Route::post('/account/post-ad', [AdController::class, 'saveAd'])->name('post-ad');
