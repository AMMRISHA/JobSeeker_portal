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
    public function login(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Check credentials first without logging in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

        // Check if the user is verified
        if (!Auth::user()->hasVerifiedEmail()) {
            Auth::logout(); // Log them out
            return redirect()->back()->withErrors([
                'email' => 'Please verify your email address before logging in.',
            ]);
        }

        // If email is verified, continue
        return redirect()->intended(route('index'));
    }

    // If login fails
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
