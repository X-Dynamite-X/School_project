<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ChackIsActive;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectUserController;

Route::get(
    '/',
    function () {
        return view('welcome');
    }
);
Route::get(
    '/waiting',
    function () {
        return view('auth.isNotActiv');
    }
);

Auth::routes();
//
Route::prefix('')->middleware(["auth", ChackIsActive::class])->group(function () {
    // Rout Users
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::prefix('admin')->middleware(["role:admin", "auth",])->group(function () {
    // Rout Users
    Route::get('/user', [UserController::class, 'index'])->name('user_index');
    Route::get('/getUser', [UserController::class, 'getUser'])->name('getUser_index');
    Route::get('/getUserData/{id}', [UserController::class, 'getUserData'])->name("getUserData_ajax");

    Route::post('/user/store', [UserController::class, 'store'])->name('user_store');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name("user_update");
    Route::delete("/user/destroy/{id}", [UserController::class, "destroy"])->name("user_destroy");

    // Rout Subjects
    Route::get('/subject', [SubjectController::class, 'index'])->name('subject_index');
    Route::get('/getSubject', [SubjectController::class, 'getSubject'])->name('getSubject_index');
    Route::get('/getSubjectData/{id}', [SubjectController::class, 'getSubjectData'])->name("getSubjectData_ajax");

    Route::post('/subject/store', [SubjectController::class, 'store'])->name("subject_store");
    Route::put('/subject/update/{id}', [SubjectController::class, 'update'])->name("subject_update");
    Route::delete("/subject/destroy/{id}", [SubjectController::class, "destroy"])->name("subject_destroy");

    //subject User
    Route::get('/getSubjectUser/{id}', [SubjectUserController::class, 'getSubjectUser'])->name('getSubjectUser_index');
    Route::get('/getSubjectUserData/{id}', [SubjectUserController::class, 'getSubjectUserData'])->name("getSubjectUserData_ajax");
    Route::get('/getSubjectUserData/{subjectId}/{userId}', [SubjectUserController::class, 'getSubjectUserDataInSubject'])->name("getSubjectUserDataInSubject_ajax");



    Route::post('/subject/user/store/{subjectId}', [SubjectUserController::class, 'store'])->name("subjectUser_store");
    Route::put('/subject/user/update/{subjectId}/{subjectUserId}', [SubjectUserController::class, 'update'])->name("subjectUser_update");
    Route::delete("/subject/user/destroy/{subjectId}/{subjectUserId}", [SubjectUserController::class, "destroy"])->name("subjectUser_destroy");
});
