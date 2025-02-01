<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Subject;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;
use App\Models\SubjectReaded;
use App\Models\Activity;
use App\Models\ClassScore;

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
        
        return view('student.subject.index', [
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

        Activity::create([
            'description' => "membuat materi: " . $subject->title,
            'user_id' => Auth::user()->id,
            "class_id" => $class->id
        ]);

        return redirect("/teacher/class/$class->id");
    }

    public function show(Lesson $lesson, Subject $subject) {

        $class = $lesson->class;
        $studentReaded = $subject->SubjectReadeds->where('is_readed', true)->count();

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . "-" . $class->class],
            ['name' => "Lihat Materi"],
        ];
        
        return view('teacher.subject.show', [
            'class' => $class,
            'subject' => $subject,
            'lesson' => $lesson,
            'breadcrumbs' => $breadcrumbs,
            'studentReaded' => $studentReaded
        ]);
    }

    public function edit(Lesson $lesson, Subject $subject) {
        
        $class = $lesson->class;
        
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . "-" . $class->class],
            ['name' => "Edit Materi: {{$subject->title}}"],
        ];

        return view('teacher.subject.edit', [
            'class' => $class,
            'lesson' => $lesson,
            'subject' => $subject,
            'breadcrumbs' => $breadcrumbs
        ]);

    }

    public function update(Lesson $lesson, Subject $subject) {

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
        

        $subject->update([
            'lesson_id' => $lesson->id,
            'title' => request()->title,
            'content' => request()->content,
            'assignment' => $filename ?? $subject->assignment,
        ]);

        return redirect("/teacher/lesson/$lesson->id/subject/$subject->id");

    }

    public function destroy(Lesson $lesson, Subject $subject) {

        $class = $lesson->class;
    
        $subject->delete();

        Activity::create([
            'description' => "menghapus materi: " . $subject->title,
            'user_id' => Auth::user()->id,
            "class_id" => $class->id
        ]);

        return redirect("/teacher/class/$class->id");
    }

    public function readed(Lesson $lesson, Subject $subject) {

        $user = Auth::user();
        $class = $lesson->class;
        // dd($SubjectReaded);
        $subject->SubjectReadeds()->where('user_id', $user->id)->update([
            'is_readed' => true,
            'score' => 200,
        ]);

        Activity::create([
            'description' => "membaca materi: " . $subject->title,
            'user_id' => Auth::user()->id,
            "class_id" => $class->id
        ]);

        $score = ClassScore::firstOrNew([
            "class_id" => $class->id,
            "user_id" => $user->id,
        ]);

        $score->score += 200;
        $score->save();

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