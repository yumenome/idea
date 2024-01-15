<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register()
    {
        app()->setLocale(session()->get('locale'));

        return view('auth.register');
    }

    public function store()
    {
        app()->setLocale(session()->get('locale'));

        $validated = request()->validate([
            'name' => 'required | min: 3 | max: 255',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | confirmed',
        ]);

        $user =User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        Mail::to($user->email)->send(new WelcomeMail($user));

        return redirect()->route('dashboard')->with('success', 'Your Account Created Successfully');
    }

    public function login()
    {
        app()->setLocale(session()->get('locale'));

        return view('auth.login');
    }

    public function auth_check()
    {
        app()->setLocale(session()->get('locale'));

        $validated = request()->validate([
            'email' => 'required | email ',
            'password' => 'required ',
        ]);

        if(Auth::attempt($validated)){

            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'yokoso!');
        }

        return redirect()->route('login')->with('failed', 'successfully failed!');
    }

    public function logout()
    {

        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'have a good day ahead...');
    }
}
