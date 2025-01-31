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
use App\http\controllers\UploadController;
use App\http\controllers\Student\SQuizController;
use App\http\controllers\Student\SEssayController;
use App\http\controllers\Student\SUploadController;
use App\http\controllers\RecapController;
use Illuminate\Support\Facades\Auth;
use App\http\controllers\ProfileController;
use App\http\controllers\MemoryGameController;
use App\http\controllers\Student\SMemoryGameController;

Route::get('/', function () {
    return view('welcome');
});

// auth
Route::get("/login", [SessionController::class, 'create'])->name('login');
Route::post("/login", [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

Route::get("/register", [RegisterController::class, 'create']);
Route::post("/register", [RegisterController::class, 'store']);

Route::get("/profile", [ProfileController::class, 'index']);
Route::post("/profile", [ProfileController::class, 'profileUpdate']);

Route::get('/profile/password', [ProfileController::class, 'password']);
Route::post('/profile/password', [ProfileController::class, 'passwordUpdate']);

Route::get('/profile/avatar', [ProfileController::class, 'avatar']);
Route::post('/profile/avatar', [ProfileController::class, 'avatarUpdate']);


Route::middleware('auth', EnsureTeacherRole::class)->group(function () {
    
    // teacher
    Route::get("/teacher", [TeacherController::class, 'index']);
    
    
    // teacher class
    Route::get("/teacher/class", [ClassController::class, 'teacher']);
    Route::get("/teacher/class/create", [ClassController::class, 'create']);
    Route::post("/teacher/class/create", [ClassController::class, 'store']);
    Route::get("/teacher/class/{class}", [ClassController::class, 'show']);
    Route::get("/teacher/{class}/activity", [ClassController::class, 'TeacherActivity']);
    // recap
    Route::get("/teacher/{class}/recap", [RecapController::class, 'index']);
    // recap subject
    Route::get("/teacher/recap/{lesson}/{subject}/subject", [RecapController::class, 'subject']);
    // recap quiz
    Route::get("/teacher/recap/{lesson}/{quiz}/quiz", [RecapController::class, 'quiz']);
    Route::get("/teacher/recap/{user}/{quiz}/quiz/answer", [RecapController::class, 'quizAnswer']);
    // recap essay
    Route::get("/teacher/recap/{lesson}/{essay}/essay", [RecapController::class, 'essay']);
    Route::get("/teacher/recap/{user}/{essay}/essay/answer", [RecapController::class, 'essayAnswer']);
    Route::patch("/teacher/recap/{user}/{essay}/essay/answer", [RecapController::class, 'essayUpdate']);
    // recap upload
    Route::get("/teacher/recap/{lesson}/{upload}/upload", [RecapController::class, 'upload']);
    Route::get("/teacher/recap/{user}/{upload}/upload/answer", [RecapController::class, 'uploadAnswer']);
    Route::patch("/teacher/recap/{user}/{upload}/upload/answer", [RecapController::class, 'uploadUpdate']);
    // class student list
    Route::get("/teacher/{class}/student", [ClassController::class, 'studentList']);
    // class setting
    Route::get("/teacher/{class}/setting", [ClassController::class, 'setting']);
    Route::patch("/teacher/{class}/setting", [ClassController::class, 'settingUpdate']);
    Route::delete("/teacher/{class}/setting", [ClassController::class, 'settingDestroy']);

    
    // teacher lesson
    Route::post("/teacher/class/{class}", [LessonController::class, 'store']);
    Route::patch("/teacher/class/{class}/edit/{lesson}", [LessonController::class, 'update']);
    Route::delete("/teacher/class/{class}/lesson/delete/{lesson}", [LessonController::class, 'destroy']);
    
    
    // teacher subject
    Route::get("/teacher/lesson/{lesson}/subject", [SubjectController::class, 'create']);
    Route::get("/teacher/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'show']);
    Route::post("/teacher/lesson/{lesson}/subject", [SubjectController::class, 'store']);
    Route::get("/teacher/lesson/{lesson}/subject/edit/{subject}", [SubjectController::class, 'edit']);
    Route::patch("/teacher/lesson/{lesson}/subject/edit/{subject}", [SubjectController::class, 'update']);
    Route::delete("/teacher/lesson/{lesson}/subject/delete/{subject}", [SubjectController::class, 'destroy']);
    

    // teacher task
    Route::get("/teacher/{class}/{lesson}/task/create", [TaskController::class, 'create']); 
    Route::post("/teacher/{class}/{lesson}/task/create", [TaskController::class, 'store']);


    // teacher task quiz
    Route::patch("/quiz/edit/{task}", [TaskController::class, 'update']);
    Route::delete("/quiz/delete/{task}", [TaskController::class, 'destroy']);


    // teacher task essay
    Route::patch("/essay/edit/{task}", [TaskController::class, 'update']);
    Route::delete("/essay/delete/{task}", [TaskController::class, 'destroy']);


    // teacher task uploads
    Route::patch("/upload/edit/{task}", [TaskController::class, 'update']);
    Route::delete("/upload/delete/{task}", [TaskController::class, 'destroy']);

    // teacher task memory game
    Route::patch("/memory/edit/{task}", [TaskController::class, 'update']);
    Route::delete("/memory/delete/{task}", [TaskController::class, 'destroy']);

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


    // teacher uploads
    Route::get("/teacher/{class}/{lesson}/{task}/upload/create", [UploadController::class, 'create']);
    Route::post("/teacher/{class}/{lesson}/{task}/upload/create", [UploadController::class, 'store']);
    Route::patch("/upload/question/edit/{upload}", [UploadController::class, 'update']);
    Route::delete("/upload/question/delete/{upload}", [UploadController::class, 'destroy']);
    Route::post("/upload/answer/download/{filename}", [UploadController::class, 'downloadAnswer']);

    
    // teacher game
    Route::get("/teacher/{class}/{lesson}/{task}/game/create", [MemoryGameController::class, 'index']); 
    Route::post("/teacher/{class}/{lesson}/{task}/game/create", [MemoryGameController::class, 'store']); 
    Route::patch("/game/images/edit/{task}", [MemoryGameController::class, 'update']);
    Route::delete("/game/images/delete/{game}", [MemoryGameController::class, 'destroy']);


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
    Route::get("/student/{class}/activity", [ClassController::class, 'StudentActivity']);
    Route::get("/student/{class}/information", [ClassController::class, 'information']);
    Route::post("/leave/class/{class}/{user}", [ClassController::class, 'leave']);    


    // student subject
    Route::get("/student/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'index']); 
    Route::post("/student/lesson/{lesson}/subject/{subject}", [SubjectController::class, 'readed']);
    Route::get("/student/download/{filename}", [SubjectController::class, 'download']);

    
    // student quiz
    route::get("/student/{class}/{lesson}/quiz/{task}", [SQuizController::class, 'show']);
    route::post("/student/{class}/{lesson}/quiz/{task}", [SQuizController::class, 'store']);
    route::get("/student/{class}/{lesson}/quiz/{task}/result", [SQuizController::class, 'result']);

    
    // student essay
    Route::get("/student/{class}/{lesson}/essay/{task}", [SEssayController::class, 'show']);
    Route::post("/student/{class}/{lesson}/essay/{task}", [SEssayController::class, 'store']);
    Route::get("/student/{class}/{lesson}/essay/{task}/result", [SEssayController::class, 'result']);


    // student uploads
    Route::get("/student/{class}/{lesson}/upload/{task}", [SUploadController::class, 'show']);
    Route::post("/student/{class}/{lesson}/upload/{task}", [SUploadController::class, 'store']);
    Route::get("/student/{class}/{lesson}/upload/{task}/result", [SUploadController::class, 'result']);


    // student game
    Route::get("/student/{class}/{lesson}/game/{task}", [SMemoryGameController::class, 'show']);
    Route::post("/student/{class}/{lesson}/game/{task}", [SMemoryGameController::class, 'store']);
    Route::get("/student/{class}/{lesson}/game/{task}/result", [SMemoryGameController::class, 'result']);

    // student discussion
    Route::get("/student/discussion", function () {
        return view('student.discussion');
    });

});

