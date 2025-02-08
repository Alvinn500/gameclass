<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Task;
use App\Models\User;

class RecapController extends Controller
{
    
    public function index(Class_listing $class)
    {
        $lessons = $class->lessons()->get();
        
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => "Rekap Nilai"]
        ];

        return view('teacher.recap.index', [
            "class" => $class,
            "lessons" => $lessons,
            "breadcrumbs" => $breadcrumbs
        ]);
    }

    public function subject(Lesson $lesson, Subject $subject) {

        $class = $lesson->class;

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['name' => $subject->title]
        ];

        // $dataSubjects = $subject->SubjectReadeds;

        return view('teacher.recap.subject', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "subject" => $subject,
            "lesson" => $lesson
        ]);

    }

    public function quiz(Lesson $lesson, Task $quiz) {

        $class = $lesson->class;
        $users = $class->users()->where("role", "student")->get();
        // dd($quiz->id);
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['name' => $quiz->title]
        ];
        return view('teacher.recap.quiz', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "users" => $users,
            "quiz" => $quiz,
            "lesson" => $lesson
        ]);

    }

    public function quizAnswer(User $user, Task $quiz) {

        $class = $quiz->lesson->class;
        $lesson = $quiz->lesson;


        $answers = $user->multipleChoiceAnswers()->where('task_id', $quiz->id)->get();
        $XP = $answers->sum('score');
        $score = 100 / $answers->count() * $answers->where("is_correct", true)->count();
        

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['link' => "/teacher/recap/$lesson->id/$quiz->id/quiz", 'name' => $quiz->title],
            ['name' => $user->name]
        ];
        
        return view('teacher.recap.quizAnswer', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "user" => $user,
            "quiz" => $quiz,
            "answers" => $answers,
            "XP" => $XP,
            "score" => $score
        ]);
    }

    public function essay(Lesson $lesson, Task $essay) {

        $class = $lesson->class;
        $users = $class->users()->where("role", "student")->get();

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['name' => $essay->title],
        ];
        // dd($essay->essays);
        return view("teacher.recap.essay", [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "essay" => $essay,
            "users" => $users,
            "lesson" => $lesson
        ]);

    }

    public function essayAnswer(User $user, Task $essay) {

        $class = $essay->lesson->class;
        $lesson = $essay->lesson;
        
        $XP = $user->essayScores->where("task_id", $essay->id)->first()->XP;
        $score = $user->essayScores->where("task_id", $essay->id)->first()->score;
        $comment = $user->essayScores->where("task_id", $essay->id)->first()->comment ?? "-";
    
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['link' => "/teacher/recap/$lesson->id/$essay->id/essay", 'name' => $essay->title],
            ['name' => $user->name]
        ];
    
        return view('teacher.recap.essayAnswer', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "user" => $user,
            "essay" => $essay,
            "XP" => $XP,
            "score" => $score,
            "comment" => $comment
        ]);
    }

    public function essayUpdate(User $user, Task $essay) {
        // dd($user->essayScores()->where("task_id", $essay->id)->get());
        request()->validate([
            "score" => "required|numeric|min:0|max:100",
            "comment" => "required"
        ]);
        
        $XP = 500 / 100 * request()->score;

        $user->essayScores()->where("task_id", $essay->id)->update([
           "score" => request()->score,
           "XP" => $XP,
           "comment" => request()->comment,
           "status" => true 
        ]);

        return redirect()->back();
    }

    public function upload(Lesson $lesson, Task $upload) {

        $class = $upload->lesson->class;
        $users = $class->users()->where("role", "student")->get();
        // dd($upload->upload); 
        
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['name' => $upload->title]
        ];

        return view('teacher.recap.upload', [
           "class" => $class,
           "upload" => $upload,
           "breadcrumbs" => $breadcrumbs,
           "users" => $users,
           "lesson" => $lesson
        ]);

    }

    public function uploadAnswer(User $user , Task $upload) {

        $class = $upload->lesson->class;
        $comment = $user->uploadScores->where("task_id", $upload->id)->first()->comment ?? "-";

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['link' => "/teacher/recap/" . $upload->lesson->id . "/$upload->id/upload", 'name' => $upload->title],
            ['name' => $user->name]
        ];
        
        return view("teacher.recap.uploadAnswer", [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "user" => $user,
            "upload" => $upload,
            "comment" => $comment
        ]);

    }

    public function uploadUpdate(User $user, Task $upload) {

        request()->validate([
            "score" => "required|numeric|min:0|max:100",
            "comment" => "required"
        ]);

        $user->uploadScores()->where("upload_id", $upload->upload->id)->update([
           "score" => request()->score,
           "XP" => 500 / 100 * request()->score,
           "comment" => request()->comment,
           "status" => true, 
        ]);

        return redirect()->back();

    }

    public function game(Lesson $lesson, Task $game) {

        $class = $game->lesson->class;
        $users = $class->users()->where("role", "student")->get();


        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['name' => $game->title]
        ];

        return view('teacher.recap.game', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "game" => $game,
            "users" => $users,
            'lesson' => $lesson,
        ]);

    }

    public function gameAnswer(User $user, Task $game) {

        $class = $game->lesson->class;
        $memory = $game->memoryGames()->where('task_id', $game->id)->first();
        $comment = $user->memoryGameScores->where("task_id", $game->id)->first()->comment ?? "-";

        $XP = $user->memoryGameScores->where("task_id", $game->id)->first()->XP;
        $score = $user->memoryGameScores->where("task_id", $game->id)->first()->score;

        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['link' => "/teacher/$class->id/recap", 'name' => "Rekap Nilai"],
            ['link' => "/teacher/recap/" . $game->lesson->id . "/$game->id/game", 'name' => $game->title],
            ['name' => $user->name]
        ];

        return view('teacher.recap.gameAnswer', [
            "class" => $class,
            "breadcrumbs" => $breadcrumbs,
            "memory" => $memory,
            "user" => $user,
            "game" => $game,
            "XP" => $XP,
            "score" => $score,
            "comment" => $comment
        ]);

    }

    public function gameUpdate(User $user, Task $game) {

        request()->validate([
            "score" => "required|numeric|min:0|max:100",
            "comment" => "required"
        ]);
        
        $XP = 0; 

        if(request()->score <= 50) {
            $XP = $user->memoryGameScores->where("task_id", $game->id)->first()->XP;
        } else {
            $XP = $user->memoryGameScores->where("task_id", $game->id)->first()->XP + 400 / 100 * request()->score;
        }

        $user->memoryGameScores()->where("task_id", $game->id)->update([
            "score" => request()->score,
            "XP" => $XP,
            "comment" => request()->comment,
            "status" => true
        ]);

        return redirect()->back();
    }

}
