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

// Ads pages
Route::get('/ads', [AdController::class, 'index'])->name('ads');
Route::get('/ads/{ad}', [AdController::class, 'single'])->name('single');
Route::get('/ads/cat/{category}', [AdController::class, 'filterByCategory']);

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// Dashboard
Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware('auth');

Route::get('/account/profile-settings', [AccountController::class, 'ProfileSettings'])->name('profile-settings')->middleware('auth');
Route::put('/account/profile-settings', [AccountController::class, 'editProfileSettings']);

Route::get('/account/post-ad', [AdController::class, 'showAdForm'])->name('post-ad')->middleware('auth')->middleware('auth');
Route::post('/account/post-ad', [AdController::class, 'saveAd'])->name('post-ad');

Route::get('/account/edit-ad/{ad}', [AdController::class, 'showEditForm'])->name('edit-ad')->middleware('auth');
Route::put('/account/edit-ad/{ad}', [AdController::class, 'editAd']);

Route::delete('/account/{ad}', [AdController::class, 'deleteAd'])->name('delete-ad');
