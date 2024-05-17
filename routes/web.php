<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectUserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(["role:admin", "auth"])->group(function () {
    // Rout Users
    Route::get('/user', [UserController::class, 'index'])->name('user_index');
    Route::get('/getUser', [UserController::class, 'getUser'])->name('getUser_index');
    Route::post('/user/store', [UserController::class, 'store'])->name('user_store');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name("user_update");

    // Rout Subjects
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject_index');
    Route::post('/subject/store', [SubjectController::class, 'store'])->name("subject_store");
    Route::put('/subject/update/{id}', [SubjectController::class, 'update'])->name("subject_update");
    Route::delete("/subject/destroy/{id}", [SubjectController::class, "destroy"])->name("subject_destroy");

    //subject User
    Route::post('/subject/user/store/{subjectId}', [SubjectUserController::class, 'store'])->name("subjectUser_store");
    Route::put('/subject/user/update/{subjectId}/{subjectUserId}', [SubjectUserController::class, 'update'])->name("subjectUser_update");
    Route::delete("/subject/user/destroy/{subjectId}/{subjectUserId}", [SubjectUserController::class, "destroy"])->name("subjectUser_destroy");
});

