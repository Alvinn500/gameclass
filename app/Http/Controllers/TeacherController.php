<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    
    public function index()
    {
        
        $user = Auth::user();
        $classes = $user->classes()->orderBy('created_at', 'desc')->get();
        $totalClass = $user->classes()->count();
        $totalStudent = $user->classes->flatMap->users->where("role", "student")->count();
        $totalSubject = $user->classes->flatMap->lessons->flatMap->subjects->count();
        $totalQuiz = $user->classes->flatMap->lessons->flatMap->tasks->flatMap->multipleChoices->count();
    
        return view('teacher.dashboard', [
            "classes" => $classes, 
            "totalClass" => $totalClass, 
            "totalStudent" => $totalStudent, 
            "totalSubject" => $totalSubject,
            "totalQuiz" => $totalQuiz
        ]);

    }

}
