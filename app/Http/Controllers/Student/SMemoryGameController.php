<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\Task;
use Illuminate\Support\Arr;
use App\Models\MemoryGameAnswer;
use App\Models\MemoryGameScore;
use Illuminate\Support\Facades\Auth;

class SMemoryGameController extends Controller
{
    
    public function show(Class_listing $class, Lesson $lesson, Task $task) 
    {

        $game = $task->memoryGames->first();
        $gameImages = [];
        // dd($game === null);
        if($game) {
            $gameImages = Arr::shuffle($game->images);
        }
        
        $breadcrumbs = [
            ['link' => "/student/class/", 'name' => 'Kelas' ],
            ['link' => "/student/class/{$class->id}", 'name' => $class->study_name],
            ['name' => $task->title]
        ];

        return view('student.game.show', [
            'game' => $game,
            'gameImages' => $gameImages,
            'class' => $class,
            'task' => $task,
            'breadcrumbs' => $breadcrumbs,
        ]);
    }

    public function store(Class_listing $class, Lesson $lesson, Task $task) {
        
        request()->validate([
            'game_id' => 'required',
            'gameXP' => 'required',
        ]);
        
        memoryGameAnswer::create([
            'answers' => [
                "memory1" => request('memory1') ?? '',
                "memory2" => request('memory2') ?? '',
                "memory3" => request('memory3') ?? '',
                "memory4" => request('memory4') ?? '',
                "memory5" => request('memory5') ?? '',
                "memory6" => request('memory6') ?? '',
            ],
            'user_id' => auth()->user()->id,
            'memory_game_id' => request('game_id'),
        ]);

        $correct = request('gameXP') / 50;
        $score = intval(50 / 7 * $correct);
        memoryGameScore::create([
            'score' => $score,
            'XP' => request('gameXP'),
            'comment' => request('comment'),
            'class_id' => $class->id,
            'task_id' => $task->id,
            'user_id' => auth()->user()->id,
        ]);

        Activity::create([
            'description' => "menyelesaikan memory game: " . $task->title,
            'user_id' => Auth::user()->id,
            "class_id" => $class->id
        ]);

        return redirect()->back();

    }
    
    // public function result(Class_listing $class, Lesson $lesson, Task $task) {
    //     return view('student.game.result', [
    //         'class' => $class,
    //         'task' => $task,
    //     ]);
    // }

}
