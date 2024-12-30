<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index(Class_listing $class) {
        return view('teacher.subject.index', ['class' => $class]);  
    }

    public function store(Class_listing $class) {
        // dd(request()->all());
        request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required'],
            'file' => ['file', 'max:2048']
        ]);

        Subject::create([
            'title' => request()->title,
            'content' => request()->content,
            'assignment' => request()->assignment,
            'lesson_id' => $class->id
        ]);

        return redirect("/teacher/class/$class->id");
    }
}
