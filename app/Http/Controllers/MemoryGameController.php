<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\MemoryGame;
use Illuminate\Support\Facades\File;


class MemoryGameController extends Controller
{
    
    public function index(Class_listing $class, Lesson $lesson, Task $task) {

        $memory = $task->memoryGames()->where('task_id', $task->id)->first();

        $breadcrumbs = [
            ["link" => "/teacher/class", "name" => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => "Game: " . $task->title]
        ];

        return view("teacher.memory.index", [
            "class" => $class,
            "lesson" => $lesson,
            "task" => $task,
            "memory" => $memory,
            "breadcrumbs" => $breadcrumbs
        ]);

    }

    public function store(Class_listing $class, Lesson $lesson, Task $task) {

        request()->validate([
            "images" => ["required", "array", "min:8", "max:8", ],
            "images.*" => ["required", "file", "mimes:jpg,jpeg,png", "max:2048"]
        ]);

        $uploadFiles = request()->file("images");
        $counter = 1;

        foreach($uploadFiles as $file) {
            $gg = $file->move("memory/$task->id", "game" . $counter . ".". $file->extension(),"public");

            $paths[] = str_replace( "\\", "/" ,$gg->getPathName());
            $counter++;
        }
        
        MemoryGame::create([
            "images" => [
                "memory1" => $paths[0],
                "memory2" => $paths[1],
                "memory3" => $paths[2],
                "memory4" => $paths[3],
                "memory5" => $paths[4],
                "memory6" => $paths[5],
                "memory7" => $paths[6],
                "memory8" => $paths[7],              
            ],
            "task_id" => $task->id
        ]);

        return redirect()->back();

    }

    public function update(Request $request, Class_listing $class, Lesson $lesson, Task $task) {
        
        request()->validate([
            "images" => ["required", "array", "min:8", "max:8", ],
            "images.*" => ["required", "file", "mimes:jpg,jpeg,png", "max:2048"]
        ]);

        $uploadFiles = request()->file("images");
        $counter = 1;

        File::deleteDirectory(public_path("memory/$task->id"));

        foreach($uploadFiles as $file) {
            $gg = $file->move("memory/$task->id", "game" . $counter . ".". $file->extension(),"public");

            $paths[] = str_replace( "\\", "/" ,$gg->getPathName());
            $counter++;
        }
        

        $task->memoryGames()->update([
            "images" => [
                "memory1" => $paths[0],
                "memory2" => $paths[1],
                "memory3" => $paths[2],
                "memory4" => $paths[3],
                "memory5" => $paths[4],
                "memory6" => $paths[5],
                "memory7" => $paths[6],
                "memory8" => $paths[7],              
            ],
            "task_id" => $task->id
        ]);

        return redirect()->back();

    }

    public function destroy(MemoryGame $game) {

        $task = $game->task;
        
        File::deleteDirectory(public_path("memory/$task->id"));

        $game->delete();

        return redirect()->back();

    }

}

