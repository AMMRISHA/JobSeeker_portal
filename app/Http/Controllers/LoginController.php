<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    // Handle the login request
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to login the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If login is successful, redirect to the intended page or default dashboard
            return redirect()->intended(route('index')); // Change 'dashboard' to your desired route
        }

        // If login fails, redirect back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Log out the user
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
