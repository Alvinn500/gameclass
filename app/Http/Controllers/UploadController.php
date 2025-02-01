<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use App\Models\Lesson;
use App\Models\Task;
use App\Models\Upload;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    
    public function create(Class_listing $class, Lesson $lesson, Task $task) {

        $upload = $task->upload;
        
        $uploadAnswered = $task->upload?->scores->count() ?? 0;
        
        $breadcrumbs = [
            ['link' => "/teacher/class", 'name' => "Kelas"],
            ['link' => "/teacher/class/$class->id", 'name' => $class->study_name . " - " . $class->class],
            ['name' => "Tugas - $task->title"],  
        ];

        return view("teacher.upload.create", [
            "class" => $class,
            "lesson" => $lesson,
            "task" => $task,
            'breadcrumbs' => $breadcrumbs,
            'upload' => $upload,
            'uploadAnswered' => $uploadAnswered
        ]);
    }

    public function store(Class_listing $class, Lesson $lesson, Task $task) {

        request()->validate([
            "question" => ["required", "min:3"],
            "file" => ["file", "max:2048"],
        ]);
        // request()->all();
        if(request()->hasFile("file")) {
            $file = request()->file("file");
            $filename = $file->getClientOriginalName();
            $file->move("uploads", $filename);
        };

        Upload::create([
            "question" => request()->question,
            "file" => $filename ?? null,
            "tasks_id" => $task->id
        ]);

        return redirect()->back();
    }

    public function update(Upload $upload) {

        request()->validate([
           'question' => ['required', 'min:3'],
           'file' => ['file', 'max:2048']
        ]);

        if(request()->hasFile("file")) {
            $file = request()->file("file");
            $filename = $file->getClientOriginalName();
            $file->move("uploads", $filename);
        };

        $upload->update([
            "question" => request()->question,
            "file" => $filename ?? $upload->file ?? null,
        ]);

        return redirect()->back();


    }

    public function destroy(Upload $upload) {

        $upload->delete();

        return redirect()->back();
    }

    public function downloadAnswer($filename) {

        $filepath = public_path('uploads/' . $filename);

        if(!file_exists($filepath)) {
            abort(404, 'File not found');
        }

        return response()->download($filepath);
    }

}
