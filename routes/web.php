<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\Auth\VerifyNewEmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ads pages
Route::get('/', [AdController::class, 'index'])->name('ads');
Route::get('/ad/{ad}', [AdController::class, 'single'])->name('single');

// Email
Route::post('/send-email', [AdController::class, 'sendEmail'])->name('sendEmail');

// Authentication
Auth::routes(['verify' => true]);
//Change email
Route::get('pendingEmail/verify/{token}', [VerifyNewEmailController::class, 'verify'])->middleware(['web', 'signed'])->name('pendingEmail.verify');

// Dashboard
Route::get('/account', [AccountController::class, 'index'])->name('account')->middleware(['auth', 'verified']);

Route::get('/account/profile-settings', [AccountController::class, 'ProfileSettings'])->name('profile-settings')->middleware(['auth', 'verified']);
Route::put('/account/profile-settings', [AccountController::class, 'edit']);

Route::get('/account/post-ad', [AdController::class, 'showAdForm'])->name('post-ad')->middleware(['auth', 'verified']);
Route::post('/account/post-ad', [AdController::class, 'create'])->name('post-ad');

Route::get('/account/ad/{ad}/edit', [AdController::class, 'showEditForm'])->name('edit-ad')->middleware(['auth', 'verified']);
Route::put('/account/ad/{ad}/edit', [AdController::class, 'edit']);

Route::delete('/account/{ad}/delete', [AdController::class, 'delete'])->name('delete-ad');
