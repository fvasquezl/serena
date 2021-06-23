<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\Users\IndexUsers;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// })->name('index');



Route::get('users', IndexUsers::class)->name('users');

// Route::get('/admin/permissions', function () {
//     return view('admin.permissions.index');
// })->name('admin.permissions');