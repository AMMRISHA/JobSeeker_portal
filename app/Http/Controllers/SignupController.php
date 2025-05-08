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
use Illuminate\Bus\Queueable;
use App\Models\Applicant;


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
            $code = rand(0, 99999);

            // dd($code);
            // Create a new user
            $user = User::create([
                'name' => $request->Firstname . ' ' . $request->Lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'birthday' => $birthday,
                'is_applicant' => $request->is_applicant ,
                'verification_code'=> $code
            ]);
            
         
            try {
                // dd($user);
                // Send the custom email verification notification
                $user->notify(new CustomEmailVerification($code));  // Use the custom notification
       
            } catch (\Exception $e) {
                dd($e->getMessage());   
            }
            // dd('created');
            return redirect()->route('verify',['email'=>$user->email])->with('success', 'Registration successful! Please check your email for verification.');
        }
    
        public function verify($email){
            $user = User::where('email', $email)->firstOrFail();
            return view('auth.verify-view',[
                'user'=>$user
            ]);
        } 

        public function verified(Request $request){

            $user = User::where('email', $request->email)->firstOrFail();
            // dd($request->verification_code);
            if($user){
                // dd("find");
                if($user->verification_code == $request->verification_code){
                    $user->is_verified = 1;
                    $user->email_verified_at = now();
                    // dd($user->is_verified);
                    $user->save();
                    return redirect()->route('login-form');
                }else{
                    $user->is_verified=0;
                    return  view('auth.verify-view',[
                        'user'=>$user
                    ]);
                }
               
            }
           
        }
   
}

