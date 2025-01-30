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
         
        $scores = $class->scores()->orderBy('score', 'desc')->get();
        
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
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name],
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

    public function indexRecap(Class_listing $class) {

        $breadcrumbs = [
            ['link' => '/student/class', 'name' => 'Kelas'],
            ['link' => "/student/class/$class->id", 'name' => $class->studey_name],
            ['name' => 'Rekap Nilai']
        ];

        return view("teacher.class.recap", [
            "breadcrumbs" => $breadcrumbs,
            "class" => $class
            
        ]);
    } 

    public function studentList(Class_listing $class) {

        $users = $class->users->where("role", "student");

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name ." - " . $class->class],
            ['name' => "Daftar Siswa"]
        ];
        // dd($class->users);
        return view('teacher.class.studentList', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "users" => $users
        ]);

    }

    public function setting(Class_listing $class) {

        $breadcrumbs = [
          ['link' => "/teacher/class", 'name' => "Kelas"],
          ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
          ['name' => "Pengaturan"]  
        ];

        return view("teacher.class.setting", [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs
        ]);

    }

    public function settingUpdate(Class_listing $class) {

        request()->validate([
            "study_name" => ["required", 'min:3'],
            "school_name" => ["required", 'min:5'],
            "class" => ["required", 'min:3'],
            "logo_class" => ["file", "mimes:jpg,jpeg,png", "max:2048"],
        ]);

        if (request()->hasFile('logo_class')) {
            $file = request()->file("logo_class");
            $filename = $file->getClientOriginalName();
            $file->move('logo_class', $filename);
        }

        $class->update([
            "study_name" => request()->study_name,
            "school_name" => request()->school_name,
            "class" => request()->class,
            "logo_class" => $filename ?? $class->logo_class,
        ]);

        return redirect()->back();
    }

    public function settingDestroy(Class_listing $class) {

        $class->delete();

        return redirect('/teacher/class');
    }

    public function information(Class_listing $class) {

        $user = Auth::user();

        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['link' => "/student/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => "Informasi"]
        ];

        return view("student.class.information", [
            "breadcrumbs" => $breadcrumbs,
            "class" => $class,
            "user" => $user
        ]);
    }

    public function leave(Class_listing $class, User $user) {

        $user->classes()->detach($class->id);

        return redirect("/student/class");
    }
}
