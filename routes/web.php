<?php

use App\Http\Controllers\Admin\{
    AdminController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/', [AdminController::class, 'index'])->name('admin.home');
});

Route::get('/', function () {
    return view('welcome');
});
