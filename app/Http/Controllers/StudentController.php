<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\SubjectReaded;
use App\Models\Subject;
use App\Models\Task;
use App\Models\MultipleChoice;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $class = $user->classes()->get();
        
        
        $totalSubjectXP = $user->SubjectReadeds->sum('score'); 
        $totalQuizXP = 0;

        foreach($user->multipleChoiceAnswers as $answer) {
            if( $answer->is_correct ) {
                $totalQuizXP += 50;
            } else {
                $totalQuizXP += 10;
            }
        }
        
        $total_xp =  $user->classScores->sum('score');
        $level = 0;
        $emblem = ""; 
        $classes = $user->classes()->orderBy('created_at', 'desc')->limit(2)->get();
        $totalClass = $user->classes()->count();;

         
        $totalSubject = $user->classes->flatMap->lessons->flatMap->subjects->count();
        $subjectReaded = $user->SubjectReadeds->where("is_readed", true)->count();
        
        $totalQuiz = $user->classes->flatMap->lessons->flatMap->tasks->filter(function ($task) {
            return in_array($task->type, [1,2]);
        })->count();
        $quizAnswered = $user->multipleChoiceAnswers->pluck('task_id')->unique()->count();

        $totalEssay = $user->classes->flatMap->lessons->flatMap->tasks->where("type", "3")->count();
        $essayAnswered = $user->essayScores->count();

        $ongoing_mission = $subjectReaded + $quizAnswered + $essayAnswered;
        $total_mission = $totalSubject + $totalQuiz + $totalEssay;
        // dd($totalEssay, $essayAnswered); 

        if ($total_xp >= 500 && $total_xp <= 1000) {
            $level = 1;
            $emblem = "pemula";
        }

        if ($total_xp >= 1000 && $total_xp <= 2000) {
            $level = 2;
            $emblem = "petualang";
        }

        if ($total_xp >= 2000 && $total_xp <= 4000) {
            $level = 3;
            $emblem = "pejuang";
        }

        if ($total_xp >= 4000 && $total_xp <= 8000) {
            $level = 4;
            $emblem = "petarung";
        }

        if ($total_xp >= 8000) {
            $level = 5;
            $emblem = "master";
        }

        return view("student.dashboard", [
            "classes" => $classes, 
            "totalClass" => $totalClass, 
            'total_xp' => $total_xp, 
            'level' => $level,
            'emblem' => $emblem,
            'total_mission' => $total_mission, 
            'ongoing_mission' => $ongoing_mission,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Class_listing $class)
    {
        
        $user = Auth::user();
        $user->classes()->attach($class->id);

        return redirect("/student/class/$class->id");
    }

    /**
     * Display the specified resource.
     */
    public function show(Class_listing $class)
    {
        $user = Auth::user();
        $lessons = $class->lessons()->get();
        $taskId = $lessons->flatMap->tasks->pluck('id');
        $subjedId = $lessons->flatMap->subjects->pluck('id');
        $subjectReadeds = SubjectReaded::whereIn('subject_id', $subjedId)->where('user_id', $user->id)->get();
        
        $score = $class->scores()->where('user_id', $user->id)->first();
        $total_xp = $user->classScores->sum('score');
        // dd($score->score ?? 0);
        
        $totalSubject = $lessons->flatMap->subjects->count();
        $totalQuiz = $lessons->flatMap->tasks->filter(function ($task) {
            return in_array($task->type, [1,2]);
        })->count();
        $totalEssay = $lessons->flatMap->tasks->where("type", "3")->count();
        $totalUploadTask = 0;

        $readed = $subjectReadeds->count('is_readed');
        $quizAnswered = $user->multipleChoiceAnswers->whereIn('task_id', $taskId)->pluck('task_id')->unique()->count();
        $essayAnswered = $lessons->flatMap->tasks->where("type", "3")->whereIn('id', $user->essayScores->pluck('task_id'))->count();
        $uploaded = 0;
        
        $total_mission = $totalSubject + $totalQuiz + $totalEssay + $totalUploadTask;
        $completed_mission = $readed + $quizAnswered + $essayAnswered + $uploaded;
        $ongoing_mission = $total_mission - $completed_mission;
        

        $level = 0;
        $emblem = "";

        if ($total_xp >= 500 && $total_xp <= 1000) {
            $level = 1;
            $emblem = "pemula";
        }

        if ($total_xp >= 1000 && $total_xp <= 2000) {
            $level = 2;
            $emblem = "petualang";
        }

        if ($total_xp >= 2000 && $total_xp <= 4000) {
            $level = 3;
            $emblem = "pejuang";
        }

        if ($total_xp >= 4000 && $total_xp <= 8000) {
            $level = 4;
            $emblem = "petarung";
        }

        if ($total_xp >= 8000) {
            $level = 5;
            $emblem = "master";
        }


        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['name' => $class->study_name],
        ];
        // dd($class->lessons);
        return view('student.class.show', [
            "class" => $class, 
            "lessons" => $lessons, 
            "breadcrumbs" => $breadcrumbs, 
            "total_xp" => $total_xp,
            "score" => $score, 
            "total_mission" => $total_mission, 
            "completed_mission" => $completed_mission, 
            "ongoing_mission" => $ongoing_mission,
            'level' => $level,
            'emblem' => $emblem,
            'subjectReadeds' => $subjectReadeds
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
