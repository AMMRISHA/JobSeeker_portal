<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JobDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index()
    {
        $job_details =JobDetails::get();
        return view('index',[
            'job_details'=> $job_details
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
    

    public function search(){

    }

}