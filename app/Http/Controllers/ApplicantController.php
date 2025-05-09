<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobDetails;
use App\Models\JobCategory;
use App\Models\Country;
use App\Models\AppliedJob;
use App\Models\State;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Applicant;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


use Carbon\Carbon;


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
        

            $user_details = User::where('id' , $request->id)->first();

            $request->validate([
                'birthday' => 'nullable|date_format:d-m-Y',
                'address' => 'nullable|string|max:255',
                'country' => 'nullable',
      
            ]);
            $formattedBirthday = $request->birthday
            ? \Carbon\Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d')
            : null;

         
            if($user_details){
                $user_details->birthday = $formattedBirthday ;

                $user_details->save();
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
                    'email'          => $user_details->email ?: null,
                ]
                );

                if ($request->hasFile('photo')) {
                
                    $photo = $request->file('photo');
                    $existing = Applicant::where('user_id', $request->id)->first();
    
                    if ($existing && $existing->photo && Storage::exists($existing->photo)) {
                        Storage::delete($existing->photo);
                       
                    }
    
                    $path = $photo->store('uploads/photos', 'public'); 
                    $existing->photo = $path;
                    $existing->save();

                  
                }
            return redirect()->route('profile')->with('success', 'Profile updated successfully!');
           
          

        }


        public function jobForApply($job_id){
            $logged_in_user = Auth::user();
            $job_details = JobDetails::where('job_id' , $job_id)->first();
           
            return view('jobDetails',[
              'job_details'  => $job_details ,
              'logged_in_user'   => $logged_in_user  
            ]) ;
        }

        public function apply(Request $request , $job_id){
            $logged_in_user = Auth::user();
            $applicant_details = Applicant::where('user_id' , $logged_in_user->id)->first();
            $country_details = Country::all();
            $state_details = State::all();
            $job_details = JobDetails::where('job_id' , $job_id)->first();

            return view('apply_job',[
               'logged_in_user'=>$logged_in_user ,
               'applicant_details'=>$applicant_details  ,
               'country_details' => $country_details ,
               'state_details'   =>$state_details ,
                'job_details'  => $job_details

            ]);

        }

        public function applicationSave(Request $request){
            
            $user_details = User::where('id' , $request->id)->first();
            $application = Applicant::where('user_id', $request->id)->first();
            
            $request->validate([
                'birthday' => 'nullable|date_format:d-m-Y',
                'address' => 'nullable|string|max:255',
                'country' => 'nullable',
      
            ]);

            $formattedBirthday = $request->birthday
            ? \Carbon\Carbon::createFromFormat('d-m-Y', $request->birthday)->format('Y-m-d')
            : null;

         
            if($user_details){
                $user_details->birthday = $formattedBirthday ;

                $user_details->save();
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
                    'email'          => $user_details->email ?: null,
                ]
                );
                $application = Applicant::where('user_id' , $request->id)->first();
                AppliedJob::updateOrCreate(
                    ['applicant_id' => $application->applicant_id ,
                     'job_id' => $request->job_id,
                 ],
                    [
                        'job_id' => $request->job_id ,
                        'user_id'=>$request->id ,
                        'skills' =>$request->skill ,
                        'desc_yourself'=>$request->about ,
                        'applied_at'=>  Carbon::now() ,
                    ]
                    );

                if ($request->hasFile('photo')) {
                
                    $photo = $request->file('photo');
                    $existing = Applicant::where('user_id', $request->id)->first();
    
                    if ($existing && $existing->photo && Storage::exists($existing->photo)) {
                        Storage::delete($existing->photo);
                       
                    }
    
                    $path = $photo->store('uploads/applicant_profiles/photos', 'public'); 
                    $existing->photo = $path;
                    $existing->save();

                }

                return view('application_submitted');
                }

                public function ApplicantFileUpload(Request $request, $id , $document_column_name)
                {

                                $user_details = User::where('id' , $id)->first();
                                $application_details= Applicant::where('applicant_id', $id)->first();
                               
                                $request->validate([
                                        $document_column_name => 'required|mimes:jpeg,jpg,png,pdf|max:2048',
                                    ]);
                            


                                if ($request->hasFile( $document_column_name)) {
                                
                                            if (!empty($application_details->$document_column_name) && Storage::disk('public')->exists($application_details->$document_column_name)) {
                                                Storage::disk('public')->delete($application_details->$document_column_name);
                                            }

                                    
                                            $file = $request->file($document_column_name);
                                            $originalFileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                                            $extension = $file->getClientOriginalExtension(); 

                                    
                                            $filename = Str::slug($originalFileName) . '.' . $extension; 
                                            $path = $file->storeAs('uploads/applicant_profiles/resume', $filename, 'public');

                                            // Save file path in database
                                          
                                           $application_details->$document_column_name = $path;
                                            $application_details->save();
                                }

                        return redirect()->back()
                        ->withFlashSuccess("Document uploaded successfully.");       

        

          
        }

        public function downloadFile($filename){

                $filePath = 'uploads/applicant_profiles/resume/' . $filename;

            
                if (!Storage::disk('public')->exists($filePath)) {
                    return redirect()->back()->with('error', 'File not found.');
                }
                $fullPath = storage_path('app/public/' . $filePath);

                return response()->download($fullPath, $filename, [
                    'Content-Type' => 'application/octet-stream',
                    'Content-Disposition' => 'attachment; filename="' . $filename . '"',
                ]);
        }

        public function deleteAlldocument(Request $request, $id, $columnname){
            $application_details= Applicant::where('applicant_id', $id)->first();
             if (!empty($application_details->$columnname) && Storage::disk('public')->exists($application_details->$columnname)) {
         
            Storage::disk('public')->delete($application_details->$columnname);
            
           
        }
       
         $application_details->$columnname= null;
  
          $application_details->save();

        return redirect()->back()->with('success', 'Contract document deleted successfully');
   

        }

        public function withdrawAppliedJob($job_id){
                $user_id = auth()->id();

                // Delete the application record
                AppliedJob::where('user_id', $user_id)
                        ->where('job_id', $job_id)
                        ->delete();

                return redirect()->back()->with('success', 'You have withdrawn your application.');

        }

}