<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SubjectController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// auth
Route::get("/login", [SessionController::class, 'create'])->name('login');
Route::post("/login", [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

Route::get("/register", [RegisterController::class, 'create']);
Route::post("/register", [RegisterController::class, 'store']);

Route::get("/profileSetting", function () {
    return view('profileSetting');
});


// teacher
Route::get("/teacher", function () {
    $user = Auth::user();
    $classes = $user->classes()->orderBy('created_at', 'desc')->get();
    $totalClass = $user->classes()->count();

    return view('teacher.dashboard', ["classes" => $classes, "totalClass" => $totalClass]);
})->middleware('auth');


// teacher class
Route::get("/teacher/class", [ClassController::class, 'index'])->middleware('auth');

Route::get("/teacher/class/create", [ClassController::class, 'create'])->middleware('auth');
Route::post("/teacher/class/create", [ClassController::class, 'store'])->middleware('auth');
Route::get("/teacher/class/{class}", [ClassController::class, 'show'])->middleware('auth');


// teacher lesson
Route::post("/teacher/class/{class}", [LessonController::class, 'store'])->middleware('auth');
Route::patch("/teacher/class/{class}/edit/{lesson}", [LessonController::class, 'update'])->middleware('auth');
Route::delete("/teacher/class/{class}/lesson/delete/{lesson}", [LessonController::class, 'destroy'])->middleware('auth');


// teacher subject
Route::get("/teacher/class/{class}/subject", [SubjectController::class, 'index'])->middleware('auth');
Route::post("/teacher/class/{class}/subject", [SubjectController::class, 'store'])->middleware('auth');


// teacher discussion
Route::get("/teacher/discussion", function () {
    return view('teacher.discussion');
});



Route::get("/game/{game}", function () {
    return view('task.game');
})->middleware('auth');

// student
Route::get("/student", function () {
    return view("student.dashboard");
})->middleware('auth');

Route::get("/student/class/{id}", function () {
    return view('student.class.index');
});

Route::get("/student/discussion", function () {
    return view('student.discussion');
});

Route::get("/student/class/lesson/{lesson}", function () {
    return view('student.class.show');
});

Route::get("/student/class/lesson/{lesson}/materi/{materi}", function () {
    return view('student.class.materi.index');
});
