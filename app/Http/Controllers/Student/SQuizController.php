<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\MultipleChoice;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
use App\Models\ClassScore;

class SQuizController extends Controller
{
    
    public function show(Class_listing $class, Lesson $lesson, Task $task) {

        $user = Auth::user();
        $quizzes = MultipleChoice::where('tasks_id', $task->id)->whereDoesntHave('answers', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        $totalQuiz = $task->multipleChoices()->count();
        
        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['link' => "/student/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => $task->title],
        ];

        if($task->multipleChoiceAnswers->where('user_id', Auth::user()->id)->count() > 0) {
            return redirect("/student/$class->id/$lesson->id/quiz/$task->id/result");
        }

        return view('student.quiz.show', [
            'class' => $class,
            'task' => $task,
            'breadcrumbs' => $breadcrumbs,
            'quizzes' => $quizzes,
            'user' => $user,
            'totalQuiz' => $totalQuiz
        ]);
    }

    public function result(Class_listing $class, Lesson $lesson, Task $task) {

        $answers = $task->multipleChoices->flatMap->answers->where("user_id", Auth::user()->id);
        $rewerdXP = 0;
        $grade =  100 / $answers->count() * $answers->where("is_correct", true)->count();

        foreach ($answers as $answer) {
            if($answer->is_correct) {
                $rewerdXP += 50;
            }else {
                $rewerdXP += 10;
            }
            
        }
        
        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['link' => "/student/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => $task->title],
        ];
        return view('student.quiz.result', [
            'breadcrumbs' => $breadcrumbs,
            'class' => $class,
            'task' => $task,
            'answers' => $answers,
            'rewerdXP' => $rewerdXP,
            'grade' => $grade
        ]);
    }

    public function store(Class_listing $class, Lesson $lesson, Task $task) { 
        
        $quizzes = MultipleChoice::where('tasks_id', $task->id)->whereDoesntHave('answers', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        
        foreach ($quizzes as $quiz) {
            $is_correct = request("user_answer" . $quiz->id) == $quiz->answer ? true : false;
            $score = $is_correct ? 50 : 10;
            
            $quiz->answers()->create([
                "answer" => request("user_answer" . $quiz->id),
                "is_correct" => $is_correct,
                "score" => $score,
                "multiple_choice_id" => $quiz->id,
                "user_id" => Auth::user()->id,
                "task_id" => $task->id
            ]);
        
            $DBscore = ClassScore::firstOrCreate([
                "class_id" => $class->id,
                "user_id" => Auth::user()->id,
            ]);

            $DBscore->XP += $score;
            $DBscore->save();
        }   

        if($task->type === 1) {
            Activity::create([
                'description' => "menyelesaikan soal quiz: " . $task->title,
                'user_id' => Auth::user()->id,
                "class_id" => $class->id
            ]);
        } else {
            Activity::create([
                'description' => "menyelesaikan soal tes: " . $task->title,
                'user_id' => Auth::user()->id,
                "class_id" => $class->id
            ]);
        }

        return redirect()->back();
    }

}