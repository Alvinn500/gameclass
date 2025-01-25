<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\Task;
use Illuminate\Support\Arr;

class SMemoryGameController extends Controller
{
    
    public function show(Class_listing $class, Lesson $lesson, Task $task) 
    {

        $game = $task->memoryGames()->first();
        $gameImages = [];
        
        if($game) {
            $gameImages = Arr::shuffle($game->images);
        }
        // $imageName = basename($gameImages[0], ".png");
        // dd($gameImages);
        return view('student.game.show', [
            'game' => $game,
            'gameImages' => $gameImages,
            'class' => $class,
        ]);
    }
    
}
