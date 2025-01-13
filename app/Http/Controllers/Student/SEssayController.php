<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\Essay;
use Illuminate\Support\Facades\Auth;

class SEssayController extends Controller
{
    
    public function show(Class_listing $class,Lesson $lesson,Task $task) {

        $essays = $task->essays()->whereDoesntHave('answers', function ($query) { 
            $query->where('user_id', Auth::user()->id); 
        })->get();

        $totalEssay = $task->essays()->count();

        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['link' => "/student/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => $task->title],
        ];

        if($essays->isEmpty()) {
            return redirect("/student/$class->id/$lesson->id/essay/$task->id/result");
        }

        return view('student.essay.show', [
            'class' => $class,
            'task' => $task,
            'breadcrumbs' => $breadcrumbs,
            'totalEssay' => $totalEssay,
            'essays' => $essays
        ]);

    }

    public function store(Class_listing $class, Lesson $lesson, Task $task) {

        $essays = Essay::where('tasks_id', $task->id)->whereDoesntHave('answers', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();

        foreach ($essays as $essay) {
            $essay->answers()->create([
                "answer" => request("user_answer" . $essay->id),
                "essay_id" => $essay->id,
                "user_id" => Auth::user()->id,
            ]);
        }

        return redirect()->back();

    }

    public function result(Class_listing $class, Lesson $lesson, Task $task) {

        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['link' => "/student/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => $task->title],
        ];

        return view('student.essay.result', [
            'breadcrumbs' => $breadcrumbs,
            'class' => $class,
            'task' => $task
        ]);

    }

}
