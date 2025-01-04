<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Class_listing;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\SubjectReaded;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
        $classes = $user->classes()->orderBy('created_at', 'desc')->get();
        $totalClass = $user->classes()->count();

        return view("student.dashboard", ["classes" => $classes, "totalClass" => $totalClass]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Class_listing $class)
    {
        
        $user = Auth::user();
        $user->classes()->attach($class->id);

        return redirect("/student/class/$class->id");
    }

    /**
     * Display the specified resource.
     */
    public function show(Class_listing $class)
    {
        $score = 0;
        $user = Auth::user();
        $lessons = $class->lessons()->get();
        $SubjectReadeds = SubjectReaded::where('user_id', $user->id)->get();
        
        foreach ($SubjectReadeds as $SubjectReaded) { 
            $score += $SubjectReaded->score;
        }

        $breadcrumbs = [
            ['link' => "/student/class", 'name' => "Kelas"],
            ['name' => $class->study_name],
        ];

        return view('student.class.show', ["class" => $class, "lessons" => $lessons, "breadcrumbs" => $breadcrumbs, "score" => $score]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
