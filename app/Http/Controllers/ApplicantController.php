<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobDetails;
use App\Models\JobCategory;
use App\Models\Country;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Support\Facades\Storage;



class ApplicantController extends Controller
{
        

        public function editprofile(){
            $logged_in_user = Auth::user();
                $user_details = Applicant::where('user_id' , $logged_in_user->id)->first();
            $country_details = Country::all();
            $state_details = State::all();
            
                return view('basicinfoedit',[
                    'logged_in_user' =>$logged_in_user  ,
                    'user_details' => $user_details ,
                    'country_details' => $country_details ,
                    'state_details'   =>$state_details
                ]);
        
        }

        public function save(Request $request){
        

            $user = User::where('id' , $request->id)->first();

            $request->validate([
                'birthday' => 'nullable|date_format:d-m-Y',
                'address' => 'nullable|string|max:255',
                'country' => 'nullable',
                // add other fields as needed
            ]);
            $formattedBirthday = $request->birthday
            ? \Carbon\Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d')
            : null;

            $user_details = User::where('id' , $request->id)->first();
            if($user_details){
                $user_details->birthday = $formattedBirthday ;

                $user_details->save();
            }
          
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
        
                // Optional: delete old photo
                $existing = Applicant::where('user_id', $request->id)->first();
                if ($existing && $existing->photo && Storage::exists($existing->photo)) {
                    Storage::delete($existing->photo);
                }
        
                // Store new photo in 'public' disk (storage/app/public)
                $path = $photo->store('uploads/photos', 'public'); // returns the path like "uploads/photos/filename.jpg"
            } else {
                $path = $existing->photo ?? null;
            }
            Applicant::updateOrCreate(
                ['user_id' => $request->id],
                [
                    'user_id' => $request->id,
                    'gender'         => $request->gender ?: null,
                    'marital_status' => $request->marital_status ?: null,
                    'father_name'    => $request->father_name ?: null,
                    'mother_name'    => $request->mother_name ?: null,
                    'phone_no'       => $request->phone_no ?: null,
                    'state'          => $request->state ?: null,
                    'city'           => $request->city ?: null,
                    'about'          => $request->about ?: null,
                    'aadhar_no'      => $request->aadhar_no ?: null,
                    'address'        => $request->address ?: null,
                    'country'        => $request->country ?: null,
                    'photo'          =>$path,
                    'email'          => $user->email ?: null,
                ]
                );

    
            return redirect()->route('profile')->with('success', 'Profile updated successfully!');
           
          

        }

}