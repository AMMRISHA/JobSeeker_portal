<?php


use App\Models\JobCategory;
use App\Models\JobDetails;

if(!function_exists('get_category_name_by_id')){
    function get_category_name_by_id($id){
        
        $category = JobCategory::where('job_category_id' , $id)->first();

        if($category){
            return $category->job_category ;
        }else{
            return "-";
        }
    }
}



if(!function_exists('get_country_name')) {
    function get_country_name($id) {
        if(is_numeric($id)) {
            $country = DB::table('countries')->where('id', '=', $id)->first(['title_en']);
            if($country){
                return $country->title_en;
            }
            else{
                return "";
            }
        } else {
            return $id;
        }
    }
}
if(!function_exists('get_country_id_by_name')) {
    function get_country_id_by_name($name) {
        if($name) {
            $country = DB::table('countries')->where('title_en', '=', $name)->first(['id']);
            if($country){
                return $country->id;
            }
            else{
                return config('app.USER_DEFAULT_COUNTRY');
            }
        } else {
            return $name;
        }
    }
}




if(!function_exists('get_city_name')) {
    function get_city_name($id) {
        if(is_numeric($id)) {
            $city = DB::table('cities')->where('id', '=', $id)->first(['name']);
            if($city){
                return $city->name;
            }
            else{
                return;
            }
        } else {
            return $id;
        }
    }
}

if(!function_exists('get_date_formated')) {
    function get_date_formated($date) {
        if($date!=''){
            $converted = date(env('DATE_FORMAT'), strtotime($date));
            return $converted;
        }
        else{
            return "--";
        }
    }
}



if(!function_exists('get_state_name')) {
    function get_state_name($id) {
        $state = DB::table('states')->where('id', '=', $id)->first(['name']);
         if($state){
            return $state->name;
        }
        else{
            return "--";
        }
    }
}
