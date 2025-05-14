<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\JobDetails;
use App\Models\Applicant;
use App\Models\JobCategory ;


class ApplicationController extends Controller{

    public function viewAllApplication(){
        $user = Auth::User();
    if (!$user) {
        return redirect()->route('login-form')->with('error', 'Please log in to access all applicant.');
    }

        $applied_job_application = DB::table('jobs')
    ->join('applied_jobs', 'applied_jobs.job_id', '=', 'jobs.job_id')
    ->join('users' , 'users.id', '=' , 'applied_jobs.user_id')
    ->where('jobs.company_hr', $user->id)
    ->select('jobs.*', 'applied_jobs.*' , 'users.*')
    ->get();
     

        return view('showAllAppliedJobs',[
            'applied_job_application' => $applied_job_application ,
            
        ]);
    }

    public function viewApplicantProfile($user_id){
        $user_details = User::where('id' , $user_id)->first();
      
        $applicant_details = Applicant::where('user_id', $user_id)->first();
     
        return view('company.applicantprofile',[
            'user_details' => $user_details ,
            'applicant_details'=> $applicant_details
        ]);
    }
public function viewAllJobs(){
    $logged_in_user = Auth::user();

    if (!$logged_in_user) {
        return redirect()->route('login-form')->with('error', 'Please log in to access your jobs.');
    }

    $job_details = JobDetails::where('company_hr', $logged_in_user->id)->get();
    $job_category = JobCategory::all();

    return view('all_jobs', [
        'job_details' => $job_details ,
        'job_category'=> $job_category 

    ]);
}



public function storeJob(Request $request)
{

    $request->validate([
        'title' => 'required',
        'company_name' => 'required',
        'key_skills' => 'required',
        'description' => 'required',
        'country' => 'required',
        'city' => 'required',
        'category' => 'required',
    ]);

    JobDetails::create([
        'title' => $request->title,
        'company_name' => $request->company_name,
        'key_skills' => $request->key_skills,
        'description' => $request->description,
        'country' => $request->country,
        'city' => $request->city,
        'category' => $request->category,
        'created_at' => now(),
        'added_by'=>auth()->id(),
        'company_hr' => auth()->id(),
    ]);


    return redirect()->route('all.jobs')->with('success', 'Job created successfully.');
}



public function editJob(Request $request ){

    $job_id = $request->job_id ;

   $request->validate([
        'title' => 'required',
        'company_name' => 'required',
        'key_skills' => 'required',
        'description' => 'required',
        'country' => 'required',
        'city' => 'required',
        'category' => 'required',
    ]);
    $job = JobDetails::where('job_id' , $job_id)->first();

  if(!$job){
    return redirect()->route('all.jobs')->with('error', 'Something went wrong');
  }else{
    $job->title =  $request->input('title');
    $job->company_name = $request->input('company_name');
    $job->key_skills = $request->input('key_skills');
    $job->description = $request->input('description');
    $job->country = $request->input('country');
    $job->city = $request->input('city');
    $job->category = $request->input('category');
    $job->updated_at = now(); // Only needed if timestamps are manually handled

    // Save the updated record
    $job->save();
  }
    // Return success response or redirect
    return redirect()->back()->with('success', 'Job updated successfully!');



}


}