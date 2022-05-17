<?php

use App\Http\Controllers\Admin\{
    AdminController,
    CourseController,
    DashboardController,
    LessonController,
    ModuleController,
    ReplySupportController,
    SupportController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware(['auth'])
    ->group(function () {
    /**
     * Reply Support
     */
    Route::post('/supports/{id}/reply', [ReplySupportController::class, 'store'])->name('replies.store');

    /**
     * Supports
     */
    Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
    Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

    /**
     * Lessons
     */
    Route::resource('/modules/{moduleId}/lessons', LessonController::class);

    /**
     * Modules
     */
    Route::resource(
        name: '/courses/{courseId}/modules',
        controller: ModuleController::class,
    );

    /**
     * Routes Course
     */
    Route::resource('/courses', CourseController::class);

    /**
     * Routes Admin
     */
    Route::put('/admins/{id}/update-image', [AdminController::class, 'uploadFile'])->name('admins.update.image');
    Route::get('/admins/{id}/image', [AdminController::class, 'changeImage'])->name('admins.change.image');
    Route::resource('/admins', AdminController::class);

    /**
     * Routes Users
     */
    Route::put('/users/{id}/update-image', [UserController::class, 'uploadFile'])->name('users.update.image');
    Route::get('/users/{id}/image', [UserController::class, 'changeImage'])->name('users.change.image');
    Route::delete('/users/{id}', [UserController::class , 'destroy'])->name('users.destroy');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::get('/', [DashboardController::class, 'index'])->name('admin.home');
});

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
