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
use App\Models\state ;



class DependantDropdownController extends Controller {

    public function fetchState(Request $request) {
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function fetchBranchStaff(Request $request) {
        $staffs = DB::table('staff_branch')->where("branch_id", $request->branch_id)->get();
        $data = array();
        $i = 0;
        foreach($staffs as $staff) {
            $user = User::where("id", $staff->staff_id)->first();
            if ($user) {
                $data[$i] = array(
                    'id' => $user->id,
                    'name' => $user->first_name . " " . $user->last_name
                );
                $i++;
            }
        }

        return response()->json($data);
    }

    public function fetchCity(Request $request) {
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }
}