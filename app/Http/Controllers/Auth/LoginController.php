<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;




class LoginController extends Controller
{
   

    public function showLoginForm()
    {
        return view('login');
    }

    
    public function login(Request $request)
    {
    $user =  $request->email;
    $user_details = User::where('email' ,$request->email )
    ->first();

    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

        if (!Auth::user()->is_verified) {
            Auth::logout(); 
            return redirect()->back()->withErrors([
                'email' => 'Please verify your email address before logging in.',
            ]);
        }


            return redirect()->intended(route('index'));
       
      
    }


    return redirect()->back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

  
    public function logout()
    {
      
        Auth::logout();
        return redirect()->route('login-form')->with('success', 'Logout successful');
    }
}
