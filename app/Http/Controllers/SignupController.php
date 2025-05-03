<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Notifications\CustomEmailVerification; 


class SignupController extends Controller
{
    public function showSignupForm(){
        $user_type = DB::table('user_type')->get();
     
        return view('signup',[
            'user_type'=>$user_type
        ]);
    }

    public function submitSignupForm(Request $request)
    {
        // dd($request);
   
            $request->validate([
                'Firstname' => 'nullable|string',
                'Lastname' => 'nullable|string',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'mobile' => 'nullable|digits:10',
                'birthday' => 'nullable|date_format:d-m-Y',
                'is_applicant' => 'nullable|integer'
            ]);
    
            // Handle the user's birthday if provided
            $birthday = $request->birthday ? Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d') : NULL;
    
            // Create a new user
            $user = User::create([
                'name' => $request->Firstname . ' ' . $request->Lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'birthday' => $birthday,
                'is_applicant' => $request->is_applicant
            ]);
    
            // dd('created');
            try {
                // Send the custom email verification notification
                $user->notify(new CustomEmailVerification());  // Use the custom notification
                dd("mail sent");
            } catch (\Exception $e) {
                dd("mail not sent");
                Log::error('Email verification failed for user: ' . $user->email . ' Error: ' . $e->getMessage());
            }
    
            return redirect()->route('index')->with('success', 'Registration successful! Please check your email for verification.');
        }
    
   
}

