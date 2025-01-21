<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Task;
use App\Models\Lesson;
use App\models\Essay;

class EssayController extends Controller
{
    
    public function create(Class_listing $class, Lesson $lesson, Task $task) {

        $essays = $task->essays;
        $studentAnswered = $task->essayScores->count();
        
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/{$class->id}", 'name' => $class->study_name . " - " . $class->class],
            ['name' => "Soal Essay - $task->title"],
        ];

        return view('teacher.essay.create', [
            "breadcrumbs" => $breadcrumbs,
            "class" => $class,
            'task' => $task,
            'essays' => $essays,
            'lesson' => $lesson,
            'studentAnswered' => $studentAnswered
        ]);
    }

    public function store(Class_listing $class, Lesson $lesson, Task $task) {

        request()->validate([
            "question" => ["required", "min:3"],
            "image" => ["file", "max:2048"],
        ]);

        if(request()->hasFile("image")) {
            $file = request()->file("image");
            $filename = $file->getClientOriginalName();
            $file->move("essays", $filename);
        };

        Essay::create([
            "question" => request()->question,
            "image" => $filename ?? null,
            "tasks_id" => $task->id
        ]);

        return redirect()->back();

    }

    public function update(Essay $essay) {

        request()->validate([
            "question" => ["required", "min:3"],
            "image" => ["file", "max:2048"],
        ]);

        if(request()->hasFile("image")) {
            $file = request()->file("image");
            $filename = $file->getClientOriginalName();
            $file->move("essays", $filename);
        };

        $essay->update([
            "question" => request()->question,
            "image" => $filename ?? $essay->image,
        ]);

        return redirect()->back();
    }

    public function destroy(Essay $essay) {

        $essay->delete();

        return redirect()->back();

    }

}
