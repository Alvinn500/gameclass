<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Subject;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Models\SubjectReaded;

class SubjectController extends Controller
{
    public function index(Lesson $lesson, Subject $subject) {

        $user = Auth::user();
        $class = $lesson->class;
        // dd($subject->SubjectReadeds->is_readed);
        $subjectReadeds = SubjectReaded::where('subject_id', $subject->id)->where('user_id', $user->id) ?? [];
        dd($subjectReadeds->is_readed);
        // foreach ($subjectReadeds as $subjectReaded) {
        //     dd($subjectReaded->is_readed);
        // }
        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['link' => "/student/class/$class->id", 'name' => $class->study_name],
            ['name' => "Materi $lesson->name"],
        ];
        
        return view('student.class.subject.index', [
            'user' => $user,
            'class' => $class, 
            'subject' => $subject, 
            "breadcrumbs" => $breadcrumbs, 
            "lesson" => $lesson,
            'subjectReadeds' => $subjectReadeds
        ]);

    }

    public function create(Lesson $lesson) {

        $class = $lesson->class;

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->class],
            ['name' => "Buat Materi"],
        ];

        return view('teacher.subject.create', ['class' => $class, "breadcrumbs" => $breadcrumbs, "lesson" => $lesson]);  
    }

    public function store(Lesson $lesson) {
        request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required'],
            'file' => ['file', 'max:2048']
        ]);

        $class = $lesson->class;

        return redirect("/teacher/class/$class->id");
    }

    public function readed(Lesson $lesson, Subject $subject) {

        $user = Auth::user();
        // dd($SubjectReaded);
        SubjectReaded::create([
            'is_readed' => true,
            'score' => 200,
            'subject_id' => $subject->id,
            'user_id' => $user->id,
        ]);

        return redirect('/student/class/' . $lesson->class->id);

    }

}