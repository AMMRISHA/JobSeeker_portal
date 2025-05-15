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
use App\Models\City ;
use App\Models\Country ;
use App\Models\State ;
use App\Models\AppliedJob;
use App\Notifications\ApplicationRejectedNotification;
use App\Notifications\ApplicationInterviewNotification;


class ApplicationController extends Controller{


    public function viewAllJobCategory(){
        $user = Auth::User();
        $added_jobs = JobDetails::where('company_hr' , $user->id )->get();
    
        if(! $added_jobs){
            return redirect()->back()->with('error', 'Something went wrong !');
        }
 
    $jobIds = $added_jobs->pluck('job_id');
// dd($jobIds);
 
    $applicantCounts = DB::table('applied_jobs')
        ->whereIn('job_id', $jobIds)
        ->select('job_id', DB::raw('count(*) as total_applicants'))
        ->groupBy('job_id')
        ->get()
        ->keyBy('job_id'); 
// dd($applicantCounts);
        
        return view('showJobAllCategory',[
            'added_jobs'=>$added_jobs ,
            'applicantCounts' => $applicantCounts,
        ]);
    }
public function viewAllApplication($job_id)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login-form')->with('error', 'Please log in to access applicants.');
    }


    $job = DB::table('jobs')->where('job_id', $job_id)->where('company_hr', $user->id)->first();
    if (!$job) {
        return redirect()->back()->with('error', 'Job not found or unauthorized.');
    }

    // Convert job key_skills string to array
    $jobSkills = array_map('trim', explode(',', strtolower($job->key_skills)));

    // Fetch all applicants for the job
    $applicants = DB::table('applied_jobs')
        ->join('users', 'users.id', '=', 'applied_jobs.user_id')
        ->join('jobs', 'jobs.job_id', '=', 'applied_jobs.job_id')
        ->where('applied_jobs.job_id', $job_id)        
        ->select('applied_jobs.*', 'users.*' ,'jobs.*'  )
        ->get();

    // Enhance applicants with skill match count
    $scoredApplicants = $applicants->map(function ($applicant) use ($jobSkills) {
        $userSkills = [];

        // Assuming user has a 'skills' column like: "PHP, Laravel, React"
        if (isset($applicant->skills)) {
            $userSkills = array_map('trim', explode(',', strtolower($applicant->skills)));
        }

        $matchCount = count(array_intersect($jobSkills, $userSkills));
        $applicant->skill_match_count = $matchCount;

        return $applicant;
    });

    // Sort applicants by skill match descending
    $sortedApplicants = $scoredApplicants->sortByDesc('skill_match_count');

    return view('showAllAppliedJobs', [
        'applied_job_application' => $sortedApplicants,
        'jobSkills' => $jobSkills,
    ]);
}


    public function viewApplicantProfile($user_id , $job_id){
        $user_details = User::where('id' , $user_id)->first();
        
$applicant_details = DB::table('applicant_details')
    ->join('applied_jobs', function ($join) use ($user_id, $job_id) {
        $join->on('applicant_details.user_id', '=', 'applied_jobs.user_id')
             ->where('applied_jobs.user_id', '=', $user_id)
             ->where('applied_jobs.job_id', '=', $job_id);
    })
    ->join('users', function ($join) use ($user_id) {
        $join->on('users.id', '=', 'applied_jobs.user_id')
             ->where('users.id', '=', $user_id);
    })
    ->select('users.*', 'applicant_details.*', 'applied_jobs.*') // Optional: you can narrow fields
    ->first();

        // dd($applicant_details);
                return view('company.applicantprofile',[
                    'user_details' => $user_details ,
                    'applicant_details'=> $applicant_details
                ]);
    }

        
    public function viewAllJobs(){
        $logged_in_user = Auth::user();
        $country_details = Country::get();
        $city_details = City::get();
        $state_details = State::get();
        if (!$logged_in_user) {
            return redirect()->route('login-form')->with('error', 'Please log in to access your jobs.');
        }

        $job_details = JobDetails::where('company_hr', $logged_in_user->id)->get();
        $job_category = JobCategory::all();

        return view('all_jobs', [
            'job_details' => $job_details ,
            'job_category'=> $job_category ,
            'country_details' => $country_details ,
            'city_details' =>$city_details ,
            'state_details' => $state_details

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
        'state'=>'required',
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
    $job->state = $request->input('state');
    $job->city = $request->input('city');
    $job->category = $request->input('category');
    $job->updated_at = now(); // Only needed if timestamps are manually handled

    // Save the updated record
    $job->save();
  }
    // Return success response or redirect
    return redirect()->back()->with('success', 'Job updated successfully!');



}

public function getStates($country_id)
{
    $states = State::where('country_id', $country_id)->get(); // Adjust model if needed
    
  return response()->json($states->pluck('name', 'id'));

}


public function applicantRejected(Request $request)
{
$applicant_details = AppliedJob::where('user_id', $request->user_id)
                               ->where('job_id', $request->job_id)
                               ->first();

if ($applicant_details) {
    $applicant_details->application_status = 'rejected';
    $applicant_details->save();
     $user = User::find($request->user_id);
        if ($user) {
            $user->notify(new ApplicationRejectedNotification($applicant_details->job_title ?? 'Job')); // Pass job title
        }
}

return redirect()->back()->with('success' , 'Application rejected');

}


public function notSelectedApplication(){
    $not_selected_application_details = AppliedJob::where('application_status', 'rejected')->get();

    return view('not_selected_application_details',[
       'not_selected_application_details'=>$not_selected_application_details , 
    ]);
}


public function selectedForInterview(Request $request){
    
$applicant_details = AppliedJob::where('user_id', $request->user_id)
                               ->where('job_id', $request->job_id)
                               ->first();
$job_title = JobDetails::where('job_id' , $request->job_id)->pluck('title')->first();
// dd($job_title);
if ($applicant_details) {
    $applicant_details->application_status = 'interview';
    $applicant_details->save();
     $user = User::find($request->user_id);
        if ($user) {
            $user->notify(new ApplicationInterviewNotification($job_title)); // Pass job title
        }
}

return redirect()->back()->with('success' , 'Application Scheduled For Interview');
}
}