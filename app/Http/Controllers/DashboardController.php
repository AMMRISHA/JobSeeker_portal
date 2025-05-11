<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class DashboardController extends Controller{

    public function index(){
        $logged_in_user = Auth::user();

        $user_details = DB::table('users')
            ->where('users.email', $logged_in_user->email)
            ->join('user_type', 'users.user_type_id', '=', 'user_type.user_type_id')
            ->join('company_hr_details', 'users.id', '=', 'company_hr_details.user_id')
            ->select(
                'users.*',
                'user_type.user_type as user_type_name',
                'company_hr_details.company_name', // replace with actual columns
                'company_hr_details.authority'
            )
    ->first();

        return view('dashboard',[
            'logged_in_user' => $logged_in_user,
            'user_details'=>$user_details,
        ]);
    }
}