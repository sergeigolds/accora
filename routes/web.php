<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/ads', function () {
    return view('ads.index');
})->name('ads');

Route::get('/ad', function () {
    return view('ads.single');
})->name('ad');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');


Route::get('/account/post-ad', function () {
    return view('account.post-ad');
})->name('post-ad');
