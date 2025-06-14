<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\PracticeValueController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupSportController;
use App\Http\Controllers\MemberController;

Route::get('/', function () {
    return view('welcome');
});

// Dasboard
Route::get('/dashboard', [UserController::class, 'show']);
Route::get('/dashboard/user', [UserController::class, 'edit']);
Route::put('/dashboard/user/update',[UserController::class, 'update'])->name('dashboard.users.update');
Route::get('/dashboard/user/password', [UserController::class, 'editPassword'])->name('editPassword');
Route::put('/dashboard/user/password/update',[UserController::class, 'updatePassword'])->name('dashboard.users.password.update');

// Route crud sans foreing key
Route::resource('users', UserController::class);
Route::resource('units', UnitController::class);
Route::resource('sports', SportController::class);
Route::resource('groups', GroupController::class);


// Ici c'est des CRUD avec des foring key
Route::resource('fields', FieldController::class);
Route::resource('practices', PracticeController::class);
Route::resource('practicevalues', PracticeValueController::class);

// CRUD table pivot
Route::resource('groups-sport', GroupSportController::class)->only([
    'index', 'create', 'store', 'destroy'
]);
Route::resource('members', MemberController::class)->only([
    'index', 'create', 'store', 'destroy'
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
