<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SubjectController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTeacherRole;
use App\Http\Middleware\EnsureStudentRole;
use App\Models\Class_Listing;
use App\http\Controllers\StudentController;
use App\Models\Lesson;
use App\Models\Subject;

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


Route::middleware('auth', EnsureTeacherRole::class)->group(function () {
    
    // teacher
    Route::get("/teacher", function () {
        $user = Auth::user();
        $classes = $user->classes()->orderBy('created_at', 'desc')->get();
        $totalClass = $user->classes()->count();
    
        return view('teacher.dashboard', ["classes" => $classes, "totalClass" => $totalClass]);
    });
    
    
    // teacher class
    Route::get("/teacher/class", [ClassController::class, 'teacher']);
    
    Route::get("/teacher/class/create", [ClassController::class, 'create']);
    Route::post("/teacher/class/create", [ClassController::class, 'store']);
    Route::get("/teacher/class/{class}", [ClassController::class, 'show']);
    
    
    // teacher lesson
    Route::post("/teacher/class/{class}", [LessonController::class, 'store']);
    Route::patch("/teacher/class/{class}/edit/{lesson}", [LessonController::class, 'update']);
    Route::delete("/teacher/class/{class}/lesson/delete/{lesson}", [LessonController::class, 'destroy']);
    
    
    // teacher subject
    Route::get("/teacher/lesson/{lesson}/subject", [SubjectController::class, 'create']);
    Route::post("/teacher/lesson/{lesson}/subject", [SubjectController::class, 'store']);
    
    
    // teacher discussion
    Route::get("/teacher/discussion", function () {
        return view('teacher.discussion');
    });

});    


Route::middleware('auth', EnsureStudentRole::class)->group(function () {
    
    // student
    Route::get("/student", [StudentController::class, 'index']);
    
    
    // student class
    Route::get("/student/class", [ClassController::class, 'student']);
    Route::get("/student/class/find" , [ClassController::class, 'find']);

    Route::post("/student/class/join/{class}", [StudentController::class, 'store']);
    Route::get("/student/class/{class}", [StudentController::class, 'show']);
    

    // student lesson
    Route::get("/student/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'index']); 
    Route::post("/student/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'readed']);

    
    
    // student discussion
    Route::get("/student/discussion", function () {
        return view('student.discussion');
    });

});

