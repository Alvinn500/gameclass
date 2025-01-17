<?php

namespace App\Http\Controllers;

use App\Models\Class_listing;
use App\Models\lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MultipleChoiceAnswer;

class ClassController extends Controller
{
    public function teacher()
    {

        $user = Auth::user();
        $classes = $user->classes()->orderBy('created_at', 'desc')->get();

        return view('teacher.class.index', ["classes" => $classes]);
    }

    public function student()
    {

        $user = Auth::user();
        $classes = $user->classes()->orderBy('created_at', 'desc')->get();
        
        return view('student.class.index', ["classes" => $classes]);

    }

    public function create()
    {
        return view('teacher.class.create');
    }

    public function store()
    {
        request()->validate([
            "study_name" => ["required", 'min:3'],
            "school_name" => ["required", 'min:5'],
            "class" => ["required", 'min:3'],
            "logo_class" => ["required", 'file', "mimes:jpg,jpeg,png", "max:2048"],
        ]);

        if (request()->hasFile('logo_class')) {
            $file = request()->file("logo_class");
            $filename = $file->getClientOriginalName();
            $file->move('logo_class', $filename);
        }

        $class = Class_listing::create([
            "study_name" => request()->study_name,
            "school_name" => request()->school_name,
            "class" => request()->class,
            "logo_class" => $filename,
        ]);

        $user = Auth::user();
        $user->classes()->attach($class->id);

        return redirect('/teacher/class');
    }

    public function show(Class_listing $class)
    {
        $user = Auth::user();
        $lessons = $class->lessons()->get();
        $lesson = lesson::find(request()->lesson_id);
        $quizzes = $class->lessons->flatMap->tasks->where("type", "1");
        // dd($lessons->flatMap->tasks->where("type", "2"));
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['name' => $class->class],
        ];

        return view('teacher.class.show', [
            "class" => $class,
             "lessons" => $lessons, 
             "lesson" => $lesson, 
             "breadcrumbs" => $breadcrumbs,
             "quizzes" => $quizzes,
            ]);
    }

    public function find() {

        $classes = Class_Listing::all();

        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['name' => "Temukan Kelas"]
        ];

        return view('student.class.find', [
            "classes" => $classes,
            "breadcrumbs" => $breadcrumbs
        ]);

    }

    public function leaderboard(Class_listing $class) {
        
        $users = $class->users->where("role", "student");
        $lessons = $class->lessons()->get();
        $taskId = $lessons->flatMap->tasks->pluck('id');
        
        // $quizScore = MultipleChoiceAnswer::whereIn('task_id', $taskId)->get();
        // $subjectScore = $class->lessons->flatMap->subjects->flatMap->SubjectReadeds;
        
        $scores = $class->scores()->orderBy('score', 'desc')->get();
        // dd($scores);
        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['name' => "Leaderboard"],
        ];
        
        return view('student.class.leaderboard', [
            "breadcrumbs" => $breadcrumbs, 
            "class" => $class, 
            "users" => $users, 
            "scores" => $scores
            // "subjectScore" => $subjectScore,
            // "quizScore" => $quizScore
        ]);

    }

    public function TeacherActivity(Class_listing $class) {

        $activities = $class->activity()->orderBy('created_at', 'desc')->get();
        // dd($class);
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link => "/teacher/class/$class->id', 'name' => $class->study_name],
            ['name' => "Aktifitas"]
        ];

        return view('teacher.class.activity', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "activities" => $activities
        ]);

    }

    public function StudentActivity(Class_listing $class) {

        $activities = $class->activity()->orderBy('created_at', 'desc')->get();
       
        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['name' => $class->study_name]
        ];

        return view('student.class.activity', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "activities" => $activities
        ]);

    }
}
