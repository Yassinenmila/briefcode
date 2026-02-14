<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController as AdminClasseController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\CompetenceController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\Teacher\ClasseController as TeacherClasseController;
use App\Http\Controllers\Teacher\SprintController as TeacherSprintController;

Route::get('/',function(){
    return redirect()->route('login');
})->middleware('guest');

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/up', function () {
    return dd(auth()->check() ? auth()->user()->roles : 'NOT LOGGED');
})->withoutMiddleware('auth');

Route::middleware(['auth', RoleMiddleware::class.':admin'])->group(function () {

    Route::get('/', fn ()=> redirect()->route('users.index'));
    Route::resource('users', UserController::class);
    Route::resource('admin/classes',AdminClasseController::class);
    Route::resource('admin/sprints', SprintController::class);
    Route::resource('admin/competences',CompetenceController::class);

});

Route::middleware(['auth', RoleMiddleware::class.':teacher'])->group(function(){


    Route::resource('teacher/classes',TeacherClasseController::class)->names('teacher.classes');
    Route::resource('teacher/sprints',TeacherSprintController::class)->names('teacher.sprints');

});

Route::middleware(['auth', RoleMiddleware::class .':student'])->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });

});

