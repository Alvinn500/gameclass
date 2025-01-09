<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\multipleChoice;
use App\Models\Task;

class QuizController extends Controller
{
    
    public function create(Class_listing $class, Lesson $lesson, Task $task) {

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => "Soal Quiz" . " - " . $task->title],
        ];

        $quizzes = $task->multipleChoices()->get();

        return view('teacher.quiz.create', [
            'class' => $class,
            'lesson' => $lesson,
            'breadcrumbs' => $breadcrumbs,
            'task' => $task,
            'quizzes' => $quizzes
        ]);
    }

    public function store(Class_listing $class, Lesson $lesson, Task $task) {

        request()->validate([
            "question" => ["required", "min:3"],
            "a" => ["required", "string"],
            "b" => ["required", "string"],
            "c" => ["required", "string"],
            "d" => ["required", "string"],
            "e" => ["required", "string"],
            "answare" => ["required"],
            "image" => ["file", "max:2048"],
        ]);

        if(request()->hasFile("image")) {
            $file = request()->file("image");
            $filename = $file->getClientOriginalName();
            $file->move("mutiple_choices", $filename);
        }
    
        $options = [
            "a" => request()->a, 
            "b" => request()->b, 
            "c" => request()->c, 
            "d" => request()->d, 
            "e" => request()->e
        ];
        
        multipleChoice::create([
            "question" => request()->question,
            "options" => $options,
            "answer" => request()->answare,
            "image" => $filename ?? null,
            "tasks_id" => $task->id
        ]);

        return redirect("/teacher/$class->id/$lesson->id/$task->id/quiz/create");
    }

    public function destroy(multipleChoice $quiz) {

        $quiz->delete();

        return redirect()->back();
    }

}
