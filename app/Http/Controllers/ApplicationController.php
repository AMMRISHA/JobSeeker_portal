<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Applicant;


class ApplicationController extends Controller{

    public function viewAllApplication(){
        $user = Auth::User();
// dd($user->id);
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
       dd($applicant_details );
        return view('company.applicantprofile',[
            'user_details' => $user_details ,
            'applicant_details'=> $applicant_details
        ]);
    }




}