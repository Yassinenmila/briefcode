<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::get('/', function () {
    return view('Admin.dashboard');
})->middleware('auth');

Route::resource('users', UserController::class)->middleware('auth');
Route::resource('classes',ClasseController::class)->middleware('auth');
