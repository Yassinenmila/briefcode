<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\CompetenceController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/',function(){
    return redirect()->route('login');
})->middleware('guest');

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);



Route::middleware(['auth', RoleMiddleware::class.':admin'])->prefix('admin')->group(function () {

    Route::get('/', fn ()=> redirect()->route('users.index'));
    Route::resource('users', UserController::class);
    Route::resource('classes',ClasseController::class);
    Route::resource('sprints', SprintController::class);
    Route::resource('competences',CompetenceController::class);

});

Route::middleware(['auth', RoleMiddleware::class.':teacher'])->prefix('teacher')->group(function(){

    Route::ressource('Students')

});

Route::middleware(['auth', RoleMiddleware::class.':student'])->prefix('student')->group(function(){

    Route::get('/',function(){
        return view('welcome');
    });

});

