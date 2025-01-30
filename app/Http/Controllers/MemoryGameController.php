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
        // dd($memory->images);
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
        // dd($task->memoryGames->count() == 0 ? true : false);
        if($task->memoryGames->count() == 0 ? true : false) {
            request()->validate([
                "images" => ["required", "array", "min:6", "max:6", ],
                "images.*" => ["required", "file", "mimes:jpg,jpeg,png", "max:2048"]
            ]);
    
            $uploadFiles = request()->file("images");
            $counter = 1;
    
            foreach($uploadFiles as $file) {
                $image = $file->move("memory/$task->id", "game" . $counter . ".". $file->extension(),"public");
    
                $paths[] = str_replace( "\\", "/" ,$image->getPathName());
                
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
                    "memory7" => $paths[0],
                    "memory8" => $paths[1],
                    "memory9" => $paths[2],
                    "memory10" => $paths[3],
                    "memory11" => $paths[4],
                    "memory12" => $paths[5],           
                ],
                "task_id" => $task->id
            ]);
        
        } else {
            request()->validate([
                "questionmemory1" => ['required', 'string', 'max:255'],
                "questionmemory2" => ['required', 'string', 'max:255'],
                "questionmemory3" => ['required', 'string', 'max:255'],
                "questionmemory4" => ['required', 'string', 'max:255'],
                "questionmemory5" => ['required', 'string', 'max:255'],
                "questionmemory6" => ['required', 'string', 'max:255'],
                "time" => ['required', 'regex:/^\d{2}:\d{2}$/'],
            ]);

            $task->memoryGames()->update([
                "questions" => [
                    "memory1" => request("questionmemory1"),
                    "memory2" => request("questionmemory2"),
                    "memory3" => request("questionmemory3"),
                    "memory4" => request("questionmemory4"),
                    "memory5" => request("questionmemory5"),
                    "memory6" => request("questionmemory6"),
                ],
                "time" => request("time")
            ]);

        }

        return redirect()->back();

    }



    public function update(Request $request, Class_listing $class, Lesson $lesson, Task $task) {
        
        $memory = $task->memoryGames()->where('task_id', $task->id)->first();

        if(request()->file("images")) {

            request()->validate([
                "images" => ["required", "array", "min:6", "max:6", ],
                "images.*" => ["required", "file", "mimes:jpg,jpeg,png", "max:2048"],
                "questionmemory1" => ['required', 'string', 'max:255'],
                "questionmemory2" => ['required', 'string', 'max:255'],
                "questionmemory3" => ['required', 'string', 'max:255'],
                "questionmemory4" => ['required', 'string', 'max:255'],
                "questionmemory5" => ['required', 'string', 'max:255'],
                "questionmemory6" => ['required', 'string', 'max:255'],
                "time" => ['required', 'regex:/^\d{2}:\d{2}$/'],
            ]);
            
            File::deleteDirectory(public_path("memory/$task->id"));
    
            $uploadFiles = request()->file("images");
            $counter = 1;
    
            foreach($uploadFiles as $file) {
                $image = $file->move("memory/$task->id", "game" . $counter . ".". $file->extension(),"public");
    
                $paths[] = str_replace( "\\", "/" ,$image->getPathName());
                
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
                    "memory7" => $paths[0],
                    "memory8" => $paths[1],
                    "memory9" => $paths[2],
                    "memory10" => $paths[3],
                    "memory11" => $paths[4],
                    "memory12" => $paths[5],               
                ],
                "questions" => [
                    "memory1" => request("questionmemory1"),
                    "memory2" => request("questionmemory2"),
                    "memory3" => request("questionmemory3"),
                    "memory4" => request("questionmemory4"),
                    "memory5" => request("questionmemory5"),
                    "memory6" => request("questionmemory6"),
                ],
                "time" => request("time")
            ]);
        } else {

            request()->validate([
                "questionmemory1" => ['required', 'string', 'max:255'],
                "questionmemory2" => ['required', 'string', 'max:255'],
                "questionmemory3" => ['required', 'string', 'max:255'],
                "questionmemory4" => ['required', 'string', 'max:255'],
                "questionmemory5" => ['required', 'string', 'max:255'],
                "questionmemory6" => ['required', 'string', 'max:255'],
                "time" => ['required', 'regex:/^\d{2}:\d{2}$/'],
            ]);
   
            foreach($memory->images as $key => $image) {

                $paths[] = $image;
                
            }
                        
            $task->memoryGames()->update([
                "questions" => [
                    "memory1" => request("questionmemory1"),
                    "memory2" => request("questionmemory2"),
                    "memory3" => request("questionmemory3"),
                    "memory4" => request("questionmemory4"),
                    "memory5" => request("questionmemory5"),
                    "memory6" => request("questionmemory6"),
                ],
                "time" => request("time")
            ]);

        }


        return redirect()->back();

    }

    public function destroy(MemoryGame $game) {

        $task = $game->task;
        
        File::deleteDirectory(public_path("memory/$task->id"));

        $game->delete();

        return redirect()->back();

    }

}

