<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

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
            'email' => 'required|email',
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
            return redirect('/teacher');
        } else {
            return redirect('/student');
        }
    }
}
