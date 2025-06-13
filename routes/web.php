<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\SportController;

Route::get('/', function () {
    return view('welcome');
});

// Route crud sans foreing key
Route::resource('users', UserController::class);
Route::resource('units', UnitController::class);
Route::resource('sports', SportController::class);


// Ici c'est des CRUD avec des foring key
Route::resource('fields', FieldController::class);
Route::resource('practices', PracticeController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
