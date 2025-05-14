<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobDetails;
use App\Models\JobCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Applicant;
use App\Models\AppliedJob;



class HomeController extends Controller
{
    
    public function index()
    {
        $logged_in_user = Auth::User();
        $job_details =JobDetails::get();
        $job_category = JobCategory::get();
        $searchflag =0;
        return view('index',[
            'job_details'=> $job_details ,
            'job_category'=>$job_category,
            'searchflag'=>$searchflag ,
            'logged_in_user' => $logged_in_user ,
        ]);
    }

    public function showAbout(){
        return view('about');
    }

    public function showprofile(){
        $logged_in_user = Auth::user();
        $user_details = Applicant::where('user_id' , $logged_in_user->id)->first();
    
        return view('profile',[
            'logged_in_user' =>$logged_in_user  ,
            'user_details' => $user_details 
        ]);
    }


    public function showallappliedjobs(){
         $logged_in_user = Auth::user();

        $job_details = DB::table('applied_jobs')
        ->join('jobs', 'applied_jobs.job_id', '=', 'jobs.job_id')
        ->where('applied_jobs.user_id', $logged_in_user->id)
        ->select('jobs.*', 'applied_jobs.applied_at')
        ->get();

    return view('all_applied_jobs', [
        'job_details' => $job_details,
        'logged_in_user' => $logged_in_user
    ]);
    }
    public function addwishlist($job)
    {
        $user = Auth::user();
    
        if (!$user) {
            return redirect()->route('login-form')->with('error', 'Please login to add to wishlist.');
        }
    
        $user->wishlist()->attach($jobId); // assuming many-to-many
    
        return back()->with('success', 'Job added to wishlist!');
    }
    

    public function search(Request $request){
        //  dd($request->category);

        $searchresult = JobDetails::where('category',$request->category)->get();
            if($searchresult)
                $searchflag=1;
            else
                $searchflag =0;
        dd($searchresult);

        return redirect()->route('index',[
            'searchresult'=>$searchresult,
            'searchflag'=>$searchflag
        ]);
    }

    public function liveSearch(Request $request)
{
    $keyword = $request->input('keyword');
    $category = $request->input('category');

    if ($request->ajax()) {
        $query = JobDetails::query();

        // First, filter by category if provided
        if (!empty($category)) {
            $query->where('job_category', $category); // Ensure your column name is correct
        }

        // Then, filter by keyword if provided
        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }

        // Limit results to prevent overload
        $jobs = $query->limit(5)->get();

        // Build the results to return
        $results = '';
        if ($jobs->count()) {
            foreach ($jobs as $job) {
                $results .= '<a href="#" class="list-group-item list-group-item-action live-search-item">'
                         . $job->title . '</a>';
            }
        } else {
            $results = '<div class="list-group-item">No results found</div>';
        }

        return response()->json(['html' => $results]);
    }

    return response()->json(['html' => '']);
}



}