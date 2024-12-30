<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Class_listing;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $class)
    {
        request()->validate([
            'lesson_name' => ['required', 'min:3'],
        ]);

        $lesson = Lesson::create([
            'name' => request()->lesson_name,
            'class_listing_id' => $class
        ]);

        return redirect("teacher/class/$class");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Class_listing $class, Lesson $lesson)
    {
        request()->validate([
            'lesson_name' => ['required', 'min:3'],
        ]);

        $lesson->update([
            'name' => request()->lesson_name,
        ]);

        return redirect("teacher/class/$class->id");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Class_listing $class,Lesson $lesson)
    {
        $lesson->delete();

        return redirect("teacher/class/$class->id");
    }
}
