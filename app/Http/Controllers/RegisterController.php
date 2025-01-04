<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use App\Models\Teacher;
use App\Models\Student;

class RegisterController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'role' => 'required',
            'password' => ['required', 'confirmed', Password::default()],
        ]);

        // dd($validated);

        $user = User::create($validated);

        $user->remember_token = Str::random(90);
        $user->save();
        Auth::login($user, true);

        if (Auth::user()->role == 'teacher') {
            Teacher::create([
                'user_id' => $user->id
            ]);
            return redirect('/teacher');
        } else {
            Student::create([
                'score' => 0,
                'user_id' => $user->id
            ]);
            return redirect('/student');
        }
    }
}
