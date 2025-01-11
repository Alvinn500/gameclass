<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SubjectController;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTeacherRole;
use App\Http\Middleware\EnsureStudentRole;
use App\http\Controllers\StudentController;
use App\http\Controllers\TaskController;
use App\http\Controllers\QuizController;
use App\http\Controllers\TeacherController;
use App\http\Controllers\TestController;
use App\http\Controllers\EssayController;
use App\http\Controllers\TaskEssayController;

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
    Route::get("/teacher", [TeacherController::class, 'index']);
    
    
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
    Route::get("/teacher/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'show']);
    Route::post("/teacher/lesson/{lesson}/subject", [SubjectController::class, 'store']);
    

    // teacher task
    Route::get("/teacher/{class}/{lesson}/task/create", [TaskController::class, 'create']); 
    Route::post("/teacher/{class}/{lesson}/task/create", [TaskController::class, 'store']);


    // teacher task quiz
    Route::patch("/quiz/edit/{task}", [TaskController::class, 'update']);
    Route::delete("/quiz/delete/{task}", [TaskController::class, 'destroy']);


    // teacher task essay
    Route::patch("/essay/edit/{task}", [TaskController::class, 'update']);
    Route::delete("/essay/delete/{task}", [TaskController::class, 'destroy']);


    // teacher quiz
    Route::get("/teacher/{class}/{lesson}/{task}/quiz/create", [QuizController::class, 'create']);
    Route::get("/teacher/{class}/{lesson}/{task}/quiz/{quiz}", [QuizController::class, 'show']);
    Route::post("/teacher/{class}/{lesson}/{task}/quiz/create", [QuizController::class, 'store']);
    Route::patch("/quiz/question/edit/{quiz}", [QuizController::class, 'update']);
    Route::delete("/quiz/question/delete/{quiz}", [QuizController::class, 'destroy']);
    

    // teacher essay
    Route::get("/teacher/{class}/{lesson}/{task}/essay/create", [EssayController::class, 'create']);
    Route::post("/teacher/{class}/{lesson}/{task}/essay/create", [EssayController::class, 'store']);
    Route::patch("/essay/question/edit/{essay}", [EssayController::class, 'update']);
    Route::delete("/essay/question/delete/{essay}", [EssayController::class, 'destroy']);


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

    Route::get("/student/{class}/leaderboard", [ClassController::class, 'leaderboard']);

    // student subject
    Route::get("/student/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'index']); 
    Route::post("/student/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'readed']);
    Route::get("/student/download/{filename}", [SubjectController::class, 'download']);

    
    
    // student discussion
    Route::get("/student/discussion", function () {
        return view('student.discussion');
    });

});

