<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', [
            "user" => $user
        ]);
    }

    public function password() {

        $user = Auth::user();

        $breadcrumbs = [ 
            ['link' => "/profile", 'name' => "Profile"], 
            ['name' => "Password"]
        ];

        return view('profile.password', [
            "user" => $user,
            "breadcrumbs" => $breadcrumbs
        ]);

    }

    public function profileUpdate() {

        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        $user = Auth::user();        

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone')
        ]);

        return redirect()->back();

    }

    public function passwordUpdate() {

        request()->validate([
            'oldPassword' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!(Hash::check(request('oldPassword'), Auth::user()->password))) {
            return redirect()->back()->withErrors(['oldPassword' => 'Password lama yang Anda masukkan salah.']);
        }

        Auth::user()->update([
            'password' => request('password')
        ]);

        return redirect("/profile");

    }

    public function avatar() {

        $user = Auth::user();

        $breadcrumbs = [ 
            ['link' => "/profile", 'name' => "Profile"], 
            ['name' => "Avatar"]
        ];

        return view('profile.avatar', [
            "user" => $user,
            "breadcrumbs" => $breadcrumbs
        ]);
    }

    public function avatarUpdate() {
        
        request()->validate([
            'avatar' => ['required', "string", "max:255"],
        ]);

        Auth::user()->update([
            'photo' => request('avatar')
        ]);

        return redirect()->back();

    }

}
