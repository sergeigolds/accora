<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ads pages
Route::get('/', [AdController::class, 'index'])->name('ads');
Route::get('/ad/{ad}', [AdController::class, 'single'])->name('single');
Route::get('/category/{cat}', [AdController::class, 'showCategory'])->name('showCategory');

// Email
Route::post('/send-email', [AdController::class, 'sendEmail'])->name('sendEmail');

// Authentication
Auth::routes(['verify' => true]);

// Dashboard
Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware(['auth', 'verified']);

Route::get('/account/profile-settings', [AccountController::class, 'ProfileSettings'])->name('profile-settings')->middleware(['auth', 'verified']);
Route::put('/account/profile-settings', [AccountController::class, 'editProfileSettings']);

Route::get('/account/post-ad', [AdController::class, 'showAdForm'])->name('post-ad')->middleware(['auth', 'verified']);
Route::post('/account/post-ad', [AdController::class, 'createAd'])->name('post-ad');

Route::get('/account/edit-ad/{ad}', [AdController::class, 'showEditForm'])->name('edit-ad')->middleware(['auth', 'verified']);
Route::put('/account/edit-ad/{ad}', [AdController::class, 'editAd']);

Route::delete('/account/{ad}', [AdController::class, 'deleteAd'])->name('delete-ad');
