<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobsCategory;
use App\Models\JobDetails;

class JobController extends Controller
{
    public function index()
    {
        // Get all job categories from the database
        $categories = JobsCategory::all();
        
        return view('jobs.index', compact('categories'));
    }

    public function search(Request $request)
    {
        // Logic for handling the search, you can customize this according to your requirements
        $jobs = JobDetails::where('category', $request->category)
                    ->where('title', 'LIKE', '%' . $request->keyword . '%')
                    ->get();
             
        return view('index', compact('jobs'));
    }
}
