<?php

namespace App\Http\Controllers;

use App\Models\Class_listing;
use App\Models\lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $classes = $user->classes()->get();

        return view('teacher.class.index', ["classes" => $classes]);
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

        return view('teacher.class.show', ["class" => $class, "lessons" => $lessons, "lesson" => $lesson]);
    }
}
