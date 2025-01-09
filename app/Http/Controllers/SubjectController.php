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
        
        $subjectReaded = $subject->SubjectReadeds()
        ->where('user_id', $user->id)
        ->firstOrCreate([
            'subject_id' => $subject->id,
            'user_id' => $user->id,
        ],[
            'is_readed' => false,
            'score' => 0,
        ]);
        
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
            'subjectReaded' => $subjectReaded
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
            'assignment' => ['file', 'max:2048']
        ]);

        $class = $lesson->class;

        if (request()->hasFile('assignment')) {
            $file = request()->file("assignment");
            $filename = $file->getClientOriginalName();
            $file->move('subject', $filename);
        }
        

        $subject = Subject::create([
            'lesson_id' => $lesson->id,
            'title' => request()->title,
            'content' => request()->content,
            'assignment' => $filename ?? null,
        ]);

        return redirect("/teacher/class/$class->id");
    }

    public function show(Lesson $lesson, Subject $subject) {

        $class = $lesson->class;
        $studentReaded = $subject->SubjectReadeds->count();

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . "-" . $class->class],
            ['name' => "Lihat Materi"],
        ];
        
        return view('teacher.subject.show', [
            'class' => $class,
            'subject' => $subject,
            'breadcrumbs' => $breadcrumbs,
            'studentReaded' => $studentReaded
        ]);
    }

    public function readed(Lesson $lesson, Subject $subject) {

        $user = Auth::user();
        // dd($SubjectReaded);
        $subject->SubjectReadeds()->where('user_id', $user->id)->update([
            'is_readed' => true,
            'score' => 200,
        ]);

        return redirect('/student/class/' . $lesson->class->id);

    }

    public function download($filename) {
        
        $filepath = public_path('subject/' . $filename);

        if(!file_exists($filepath)) {
            abort(404, 'File not found');
        }

        return response()->download($filepath);

    }

}