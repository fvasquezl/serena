<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Roles\IndexRoles;
use App\Http\Livewire\Admin\Users\IndexUsers;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// })->name('index');

Route::get('', [HomeController::class, 'index'])->name('home');
Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');

//Route::get('users', IndexUsers::class)->name('users');

// Route::get('roles', IndexRoles::class)->name('roles');


// Route::get('/admin/permissions', function () {
//     return view('admin.permissions.index');
// })->name('admin.permissions');
