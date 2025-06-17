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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [UserController::class, 'show'])->middleware('share.data');
Route::get('/dashboard/user', [UserController::class, 'edit'])->middleware('share.data');
Route::put('/dashboard/user/update',[UserController::class, 'update'])->name('dashboard.users.update')->middleware('share.data');
Route::get('/dashboard/user/password', [UserController::class, 'editPassword'])->name('editPassword')->middleware('share.data');
Route::put('/dashboard/user/password/update',[UserController::class, 'updatePassword'])->name('dashboard.users.password.update')->middleware('share.data');

Route::get('/dashboard/group/create', [GroupController::class, 'create'])->name('dashboard.group.create')->middleware('share.data');
Route::get('/dashboard/group/{group}', [GroupController::class, 'show'])->name('dashboard.group.show')->middleware('share.data');
Route::get('/dashboard/group/view/{group}', [GroupController::class, 'showview'])->name('dashboard.group.showview')->middleware('share.data');
Route::get('/dashboard/group/edit/{group}', [GroupController::class, 'edit'])->name('dashboard.group.edit')->middleware('share.data');
Route::delete('/dashboard/group/{group}', [GroupController::class, 'destroy'])->name('dashboard.group.destroy')->middleware('share.data');
Route::delete('/dashboard/group/membre/{group}/{member}', [MemberController::class, 'destroy'])->name('dashboard.members.delete')->middleware('share.data');
Route::delete('/dashboard/group/sport/{group}/{sport}', [GroupSportController::class, 'destroy'])->name('dashboard.groupsport.delete')->middleware('share.data');
Route::post('/dashboard/group/sport/create', [GroupSportController::class, 'store'])->name('dashboard.group.sport.create')->middleware('share.data');
Route::get('/dashboard/practice/create', [PracticeController::class, 'create'])->name('dashboard.practice.create')->middleware('share.data');
Route::post('/dashboard/group/{group}/practice/{practice}/field/create', [FieldController::class, 'store'])->name('dashboard.field.create')->middleware('share.data');


Route::get('/dashboard/groups/', [GroupController::class, 'index'])->name('dashboard.groups.index')->middleware('share.data');
Route::get('/dashboard/practices/', [PracticeController::class, 'index'])->name('dashboard.practices.index')->middleware('share.data');
Route::put('/dashboard/practices/update', [PracticeController::class, 'update'])->name('dashboard.practices.update')->middleware('share.data');
Route::get('/dashboard/mygroups/', [GroupController::class, 'mygroups'])->name('dashboard.groups.mygroups')->middleware('share.data');

// Route crud sans foreing key
Route::resource('users', UserController::class)->middleware('share.data');
Route::resource('units', UnitController::class);
Route::resource('sports', SportController::class);
Route::resource('groups', GroupController::class)->middleware('share.data');


// Ici c'est des CRUD avec des foring key
Route::resource('fields', FieldController::class);
Route::resource('practices', PracticeController::class)->middleware('share.data');
Route::resource('practicevalues', PracticeValueController::class);

// CRUD table pivot
Route::resource('groups-sport', GroupSportController::class)->only([
    'index', 'create', 'store', 'destroy'
]);
Route::resource('members', MemberController::class)->only([
    'index', 'create', 'store', 'destroy'
]);

Auth::routes();


