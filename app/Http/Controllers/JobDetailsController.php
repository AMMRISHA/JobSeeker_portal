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


class JobDetailsController extends Controller{

public function loadEditModal(Request $request){

    $job_id = $request->http_build_query('id');

    $job_details = JobDetails::where('job_id' , $job_id)->first();
    return view('job.job_edit_modal',[
        'job_details' => $job_details ,
    ]);

}





}