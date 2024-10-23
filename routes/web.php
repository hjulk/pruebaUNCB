<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Auth::routes();
Route::resource('users', UserController::class)->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');