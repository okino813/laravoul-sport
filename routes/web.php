<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\UnitController;

Route::get('/', function () {
    return view('welcome');
});

// Route crud pour User
Route::resource('users', UserController::class);
Route::resource('fields', FieldController::class);
Route::resource('units', UnitController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
